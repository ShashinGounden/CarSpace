<?php
include_once 'php/config.php';

session_start();

// $conn

if ($_SERVER["REQUEST_METHOD"] != "POST"){
    //todo
    die("Error page");
}

$nameErr = $emailErr = $surnameErr = $passwordErr = $userErr = "";
$name = $email = $surname = $password = "";

//validation

$valid = true;

//name
if (empty($_POST["name"])){
    $nameErr = "Name is require";
    $valid = false;
}else {
    if (strlen($_POST["name"]) === 0){
        $valid = false;
        $nameErr = "Name is required";
    }
    $name = sanitiseString($_POST["name"]);
}

//surname
if (empty($_POST["surname"])){
    $surnameErr = "Surname is require";
    $valid = false;
}else {
    if (strlen($_POST["surname"]) === 0){
        $valid = false;
        $surnameErr = "Surname is required";
    }
    $surname = sanitiseString($_POST["surname"]);
}


//email
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $valid = false;
  } 
  else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $valid = false;
        $emailErr = "Invalid email";
    }else {
        $email = sanitiseString($_POST["email"]);
    }  
}


//password
if (empty($_POST["password"])) 
{
    $passwordErr = "Password is required.";
    $valid = false;
} 
else {
    $password = $_POST["password"];
    $uppercase = preg_match('#[A-Z]+#', $password) === 1;
    $lowercase = preg_match('#[a-z]+#', $password) === 1;
    $number    = preg_match('#[0-9]+#', $password) === 1;
    $specialChars = preg_match('/[\'^!£$%&*()}{@#~?><>,|=_+¬-]/', $password) ===1;
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) 
    {
        $valid = false;
        $passwordErr = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
        $password = sanitiseString($_POST["password"]);
    }
}

$res = false;

if ($valid === true) 
{
    //create user

    // generate password hash
    $hash = hashPassword($email, $password);

    // generate api_key
    $api_key = hash('md5', "api_s3cr3t".$email);
    
    //helps prevent sqli
    $connec = mysqli_connect('wheatley.cs.up.ac.za','u21458686','QNNG44DSL5VSLF5STO77LABLDZJHNHZK','u21458686');
    $stmt = $connec->prepare("INSERT INTO userInformation (name, surname, email, password, api_key) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $surname, $email, $hash, $api_key);
    try {

        $res = $stmt->execute();
    
        if ($res)
        {
            //success
           // $_SESSION['email'] = $email;
           // $_SESSION['api_key'] = $api_key;
    
        }else 
        {
            //failure
            //email already
            $emailErr = "User with email already exists";
        }
    }catch (mysqli_sql_exception $e){
        //failure
        //email already exists
        $emailErr = "User with email already exists";
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
    <title>Sign Up Confirmed</title>
</head>

<body>
<header>
<?php
  include_once "php/header.php";
?>
</header>


        <?php if(!empty($userErr)) echo "<p class='error'>".$userErr."</p>"; ?>
        <?php if(!empty($nameErr)) echo "<p class='error'>".$nameErr."</p>"; ?>
        <?php if(!empty($passwordErr)) echo "<p class='error'>".$passwordErr."</p>"; ?>
        <?php if(!empty($emailErr)) 
        {

            echo("
            <div class='error-container'>
            <h1>Account Creation Error.</h1>
            <p>$emailErr</p>
            <p>The email you entered is already in use. Please try again with a different email or 
            <a class ='btn' href='login.php'>login</a> if you already have an account.</p>
            </div>");
        }
        ?>

        <?php if(!empty($surnameErr)) echo "<p class='error'>".$surnameErr."</p>"; ?>

        <?php if($res === true) 
        {
            echo ("<div class='error-container'>
            <h1>Success!</h1>
            <p>Your account has been successfully created. <br>
            Your API key is:</p>
            <p class='apikey'><b>$api_key</b></p>
            <p><a href='login.php'>Login</a> now to find and compare all the cars you can think of!</p>
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

