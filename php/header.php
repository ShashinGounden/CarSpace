<?php
 include_once "config.php";

 session_start();
 $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<nav>
<img class='logo' src='img/logo.png' alt = 'Car Space Logo'>

        <ul> 
        
        <?php
           if ($activePage == "index")
           {
            echo("<li><a href='index.php' class='active-page'>Cars</a></li>");
           }
           else
           {
            echo("<li><a href='index.php'>Cars</a></li>");
           }

           if ($activePage == "Brands")
           {
            echo("<li><a href='Brands.php' class='active-page'>Brands</a></li>");
           }
           else
           {
            echo("<li><a href='Brands.php'>Brands</a></li>");
           }

           if ($activePage == "FindCar")
           {
            echo("<li><a href='FindCar.php' class='active-page'>Find a car</a></li>");
           }
           else
           {
            echo("<li><a href='FindCar.php'>Find a car</a></li>");
           }

           if ($activePage == "Compare")
           {
            echo("<li><a href='Compare.php' class='active-page'>Compare</a></li>");
           }
           else
           {
            echo("<li><a href='Compare.php'>Compare</a></li>");
           }

            if (isset($_SESSION["apikey"]))
            {
               echo("<li><a href='logout.php'>Logout</a></li>");
            }
            else
            {
               if ($activePage == "login")
               {
                  echo("<li><a href='login.php' class='active-page'>Login</a></li>");
               }
               else
               {
                  echo("<li><a href='login.php'>Login</a></li>");
               }

               if ($activePage == "signup")
               {
                  echo("<li><a href='signup.php' class='active-page'>Register</a></li>");
               }
               else
               {
                  echo("<li><a href='signup.php'>Register</a></li>");
               }
               
            }
           
        ?>
       
       <?php
       if (isset($_SESSION['apikey']))
       {
         echo('<button id="toggle-theme-btn" class="toggle-switch">Toggle Theme</button>');
       }
       ?>
      
          
          
        </ul>
  </nav>

  <script src="js/theme.js"></script>
 