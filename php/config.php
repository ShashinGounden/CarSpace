<?php

class Database
{
    public $conn;
    public static function instance()
    {
        $serverName = "wheatley.cs.up.ac.za";
        $userName = "";
        $password = "";
        $database = "";

        static $instance = null;

        if ($instance === null)
        {
            $instance = new Database($serverName,$userName,$password,$database);
        }

        return $instance;
    }

    private function __construct($serverName,$userName,$password,$database)
    {
        $this->conn=mysqli_connect('wheatley.cs.up.ac.za','','','');

        if ($this->conn->connect_error)
        {
            die("failed to connect to database");
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }

        public function query($args)
        {
        return $this->conn->query($args);
        }

}
 function sanitiseString($param)
{
    
   $param = strip_tags($param);
   $param = htmlentities($param);
   $param = htmlspecialchars($param);

    return $param;

}

 function hashPassword($email, $password)
 {
    //dynamic
    $salt = "SuperS3cr3tSalt".$email;
    return hash('sha256', $salt.$password);
}

?>

