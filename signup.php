<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id ="theme-link" rel="stylesheet" href="css/dark/signup.css" >
    <title>Sign Up</title>
</head>
<body>

<header>
<?php
session_start();

  include_once "php/header.php";
?>
</header>

<div class="signupFrm">
    <form action="validate-signup.php" class="form" method ="post" onsubmit = "return validateAll()">
      <h1 class="title">Sign up</h1>
      <p>Please enter your details to sign up</p>
      <br>
      
      <div class="inputContainer">
        <input type="text" class="input" name="name" placeholder="a" id ="name" onkeyup = "validateName()">
        <label for="" class="label">Name</label>


        <script type = "application/javascript">
          var validName = false;
          var validSurname = false;
          var validEmail = false;
          var validPassword = false;
        </script>

        <script type = "application/javascript">
          /*Javascript function validates name on client-side*/
          function validateName()
          {
            var nameInput = document.getElementById("name");
            var nameEntered = document.getElementById("name").value;
            //must be longer than a character, and only contain letters a-z or A-Z
            var nameRegex = /^[A-Za-z]+$/;

            if (nameRegex.test(nameEntered))
            {
              nameInput.style.border = "2px solid green";
              validName = true;
            }
            else
            {
              nameInput.style.border = "2px solid red";
              validName = false;
            }
          }
        </script>

      </div>

      <div class="inputContainer">
        <input type="text" class="input" name="surname" placeholder="a" id ="surname" onkeyup="validateSurname()">
        <label for="" class="label">Surname</label>
        <script type = "application/javascript">
          /*Javascript function validates surname on client-side*/
          function validateSurname()
          {
            var nameInput = document.getElementById("surname");
            var nameEntered = document.getElementById("surname").value;
            //must be longer than a character, and only contain letters a-z or A-Z
            var nameRegex = /^[A-Za-z]+$/;

            if (nameRegex.test(nameEntered))
            {
              nameInput.style.border = "2px solid green";
              validSurname = true;
            }
            else
            {
              nameInput.style.border = "2px solid red";
              validSurname = false;
            }
          }
        </script>

        
      </div>

      <div class="inputContainer">
        <input type="email" class="input" name="email" placeholder="a" onkeyup = "validateEmail()" id ="emailAddress">
        <label for="" class="label">Email</label>

        
        <script type = "application/javascript">
          /*Javascript function validates email on client-side*/
          function validateEmail()
          {
            var emailInput = document.getElementById("emailAddress");
            var emailEntered = document.getElementById("emailAddress").value;
            var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (emailRegex.test(emailEntered))
            {
              emailInput.style.border = "2px solid green";
              validEmail = true;
            }
            else
            {
              emailInput.style.border = "2px solid red";
              validEmail = false;
            }
          }
        </script>

      </div>

      <div class="inputContainer">
        <input type="password" class="input" name="password" placeholder="a" id ="password" onkeyup = "validatePassword()">
        <label for="" class="label">Password</label>
        <script type = "application/javascript">
          /*Javascript function validates password on client-side*/
          function validatePassword()
          {
            var passwordInput = document.getElementById("password");
            var passwordEntered = document.getElementById("password").value;
            var passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{9,}$/;

            if (passwordRegex.test(passwordEntered))
            {
              passwordInput.style.border = "2px solid green";
              validPassword = true;
            }
            else
            {
              passwordInput.style.border = "2px solid red";
              validPassword = false;
            }
          }
        </script>
      </div>

      
      <button type="submit" name = "submit" class="submitBtn" value="submit" id = "signUpBtn">Sign Up</button>

      <script type = "application/javascript">
          /*Javascript function validates all fields on client-side*/
          function validateAll()
          {
            if (validName && validSurname && validEmail && validPassword)
            {
              return true;
            }
            else
            {
              alert("Please enter valid information!");
              return false;
            }
          }
        </script>


    </form>
  </div>

    <footer>
        <?php
        include_once "php/footer.php";
        ?>
    </footer>

</body>
</html>