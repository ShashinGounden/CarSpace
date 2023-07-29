<?php

//change path when uploading to wheatley
//include_once "COS216/PA3/php/config.php";
include_once "php/config.php";
session_start();

class CarAPI 
{
    private $db;

    public static function instance()
    {
        static $instance = null;

        if ($instance === null)
        {
            $instance = new CarAPI();
        }

        return $instance;
    }


    public function __construct() 
    {
        $this->db = Database::instance();
    }
    
 //   public validateAPIKey($Apikey){
//
 //   }
    
    public function handleRequest()
    {

        $postData = json_decode(file_get_contents("php://input"), true);

        
        //get API key
        //check if API key in database
        //else unauthorised
        if (!isset($postData['apikey']) ) 
        {
            $this->sendResponse(array('status' => 'error', 'timestamp' => time(), 'data' => 'Error. No API key provided.'));
            return;    
        }
        else 
        {
            //todo add security 
            $apiKey = $postData['apikey'];
            //Checks for valid key
            $result = $this->db->conn->query("SELECT api_key FROM userInformation WHERE api_key like '".$apiKey."'");
            if ($result->num_rows <= 0){
                http_response_code(403);
                $this->sendResponse(array('status' => 'error', 'timestamp' => time(), 'data' => 'Error. Invalid API key.'));
                exit();
            }
        }
            
        $requestType = $postData['type'];

        //prevent sqli
        $requestType = sanitiseString($requestType);
        

        switch ($requestType)
         {
            case 'GetAllCars':
                //check api
                if (isset($postData['return'])) 
                {
                    $returnFields = $postData['return'];
                } 
                else 
                {
                    $returnFields = null;
                    $this->sendResponse(array('status' => 'error', 'timestamp' => time(), 'data' => 'Error. You did not provide the return field!'));
                    return;
                }
                
                if (isset($postData['search'])) 
                {
                    $searchParams = $postData['search'];
                } 
                else 
                {
                    $searchParams = null;
                }

                if (isset($postData['fuzzy'])) 
                {
                    if ($postData['fuzzy'] == false)
                    {
                        $fuzzySearch = false;
                    }
                    else{
                        $fuzzySearch = true;
                    }
                } 
                else 
                {
                    $fuzzySearch = true;
                }

                if (isset($postData['limit'])) 
                {
                    $limit = $postData['limit'];
                  

                    if ($limit<1 || $limit>500)
                    {
                        $this->sendResponse(array('status' => 'error', 'timestamp' => time(), 'data' => 'Error. Limit should be between 1 and 500'));
                        return;
                    }
                    
                }
                else 
                {
                    $limit = null;
                }

                if (isset($postData['sort'])) 
                {
                    $sort = $postData['sort'];
                } else {
                    $sort = null;
                }

                if (isset($postData['order'])) 
                {
                    $order = $postData['order'];
                } 
                else 
                {
                    $order = null;
                }

                if (in_array('image', $returnFields))
                {
                    $image = true;
                }
                else
                {
                    $image = false;
                }

                //add to filter by transmission
                if (isset($postData['transmission']))
                {
                    $transmission = $postData['transmission'];
                }
                else
                {
                    $transmission =  null;
                }

                if (isset($postData['engine_type']))
                {
                    $engine = $postData['engine_type'];
                }
                else
                {
                    $engine =  null;
                }


                
                
                $result = $this->getAllCars($returnFields, $searchParams, $fuzzySearch, $limit, $sort, $order, $image, $transmission, $engine);
                $this->sendResponse(array('status' => 'success', 'timestamp' => time(), 'data' => $result));
                break;
            case "rate":
                    $connec = mysqli_connect('wheatley.cs.up.ac.za','u21458686','QNNG44DSL5VSLF5STO77LABLDZJHNHZK','u21458686');
                    $postData = json_decode(file_get_contents("php://input"), true);
                    $id_trim = $postData['id_trim'];
                    $apikey = $postData["apikey"];
                    $rating = $postData['rating'];
                    $stmt = $connec->prepare("INSERT INTO userRatings (id_trim, apikey, rating) VALUES (?,?,?) ON DUPLICATE KEY UPDATE rating='$rating'");
                    
                   

                    $stmt->bind_param("isi", $id_trim, $apikey, $rating);
                    try 
                    {
                        $res = $stmt->execute();
                        if ($res)
                        {
                            $message  = "Sucessfully rated: " . $rating . "/10";
                            echo $message;
                        }
                        else 
                        {
                            $err = "error rating car";
                        }
                    }
                    catch (mysqli_sql_exception $e)
                    {
                        $err = "error rating car";
                    }
                break;
            case "update":
                    $connec = mysqli_connect('wheatley.cs.up.ac.za','u21458686','QNNG44DSL5VSLF5STO77LABLDZJHNHZK','u21458686');
                    $postData = json_decode(file_get_contents("php://input"), true);
                    $apikey = $postData["apikey"];
                    $preferences = $postData['preferences'];

                    $preferencesString = implode("," , $preferences);
                    
                    $stmt = $connec->prepare("UPDATE userInformation SET preferences=? WHERE api_key=?");
                    $stmt->bind_param("ss", $preferencesString, $apikey);

                    //todo: remove?
                    try 
                    {
                        $res = $stmt->execute();
                        if ($res)
                        {
                            //successfully updated preferences
                            $_SESSION['preferences'] = $preferencesString;
                            $this->sendResponse(array('status' => 'success', 'timestamp' => time(), 'data' => $preferencesString));
                        }
                        
                       
                    }
                    catch (mysqli_sql_exception $e)
                    {
                        $err = "error saving preferences";
                    }

                break;
            default:
            {
                $this->sendResponse(array('status' => 'error', 'timestamp' => time(), 'data' => 'Error. Provide a valid type field!'));
            }
                
        }
    }
    
    private function getAllCars($returnFields, $searchParams, $fuzzySearch, $limit, $sort, $order, $image, $transmission, $engine)
    {
        
        $query = "SELECT ";
        if ($returnFields) 
        {
            $query .= implode(",", $returnFields);
            $query = str_replace(',image', '', $query);
        } 
        else 
        {
            $query .= "*";
        }

        $query .= " FROM cars";

        

        if ($searchParams != null) 
        {
            $query .= " WHERE ";
            $searchTerms = array();

            if ($fuzzySearch == true)
            {
                foreach ($searchParams as $key => $value) 
                {
                    $value = sanitiseString($value);
                    $key = sanitiseString($key);
                    $searchTerms[] = $key . " LIKE '" . ( "%" . $value . "%") . "'";
                    
                    
                }
    
                $query .= implode(" AND ", $searchTerms);
            }
            else
            {
                foreach ($searchParams as $key => $value) 
                {
                    $value = sanitiseString($value);
                    $key = sanitiseString($key);
                    $searchTerms[] = $key . " ='" . $value . "'";
                }
    
                $query .= implode(" AND ", $searchTerms);
            }

           
        }

        if ($transmission != null)
        {
            $query .= " AND transmission = " . "'" . $transmission . "'";
        }

        if ($engine != null)
        {
            $query .= " AND engine_type = " . "'". $engine . "'";
        }

        if ($sort != null) 
        {
            $query .= " ORDER BY ";
            $addition = implode(",", $sort);
            $query .= $addition;

            if ($order != null)
            {
                $query .= " " . sanitiseString($order);
            }
        } 

        if ($limit != null)
        {
            $query .= " LIMIT " . sanitiseString($limit);
        }

        $result = $this->db->query($query);
        

        while ($row = $result->fetch_assoc()) 
        {
            
            if ($image == true)
            {
                if (array_key_exists('make', $row) && array_key_exists('model', $row))
                {
                    
                    
                    // Build the URL with the query parameters
                    $model = sanitiseString($row['model'],$model);
                    $make = sanitiseString($row['make'],$make);
                    

                    $url = 'https://wheatley.cs.up.ac.za/api/getimage?' . "brand=". urlencode($make) . "&model=" . urlencode($model);


                   
                    
                    // Set up the cURL
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                    ));
                    
                    // Execute the cURL request and get the response data
                    $responseImage = curl_exec($curl);
                    $error = curl_error($curl);
                    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                    
                    // Close the cURL
                    curl_close($curl);

                    if (!$error) 
                    {
                        $row['image'] =  $responseImage;
                    }
                    else
                    {
                        $row['image'] =  "Error retrieving image";
                    }
                }
            }

            $rows[] = $row;
        }


       

        return $rows;
    }
    
    private function sendResponse($responseData) 
    {
        header('Content-Type: application/json');
        echo json_encode($responseData);
    }
}

// Initialize API with API key
// $apiKey = 'a9198b68355f78830054c31a39916b7f';
$carAPI = new CarAPI();

// Handle incoming request
$carAPI->handleRequest();
?>