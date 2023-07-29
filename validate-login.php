<?php
session_start();
    require_once 'php/config.php';
    

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!isset($_POST["email"]) || !isset($_POST["password"]))
        {
            //todo error handling
            die();
        }

        //handling form submission

        $email = $_POST["email"];
        $password = $_POST["password"];
        $loginErr = "";

        //sanitise
        $email = sanitiseString($email);
        $hash_password = hashPassword($email, $password);

        $conn = Database::instance();
        // $result = $conn->query("SELECT email,api_key FROM userInformation WHERE email='".$email."' and password='".$hash_password."'");
        $result = $conn->query("SELECT email,api_key,preferences FROM userInformation WHERE email='".$email."' and password='".$hash_password."'");
        if ($result->num_rows > 0)
        {
            //if something found
            $row = $result->fetch_row();
            $_SESSION["email"] = $row[0];

            //return api key
            $_SESSION["apikey"] = $row[1];

            $_SESSION["preferences"] = $row[2];

            $apikey = $_SESSION["apikey"];

            //set cookie valid for an hour
            setcookie("apikey", $apikey, time() + 3600);

            header("Location: /PA4/index.php");
            exit();
        }
        else 
        {
            $loginErr = "User with the credentials entered does not exist";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id ="theme-link" rel="stylesheet" href="css/dark/validate-signup.css" >
    <title>Invalid Login</title>
</head>

<body>
<header>
<?php
  include_once "php/header.php";
?>
</header>

<?php
   if (!empty($loginErr))
   {
       echo("
       <div class='error-container'>
       <h1>Login error.</h1>
       <p>$loginErr</p>
       <p>The email or password you entered is incorrect. Please try again with a different email or password.<hr><br>Alternatively
       <a class ='btn' href='login.php'>login again</a> if you entered your details incorrectly.</p>
       </div>");
   }
?>

        
<footer>
<?php
  include_once "php/footer.php";
?>
</footer>

</body>
</html>