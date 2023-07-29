 <!-- Name: Shashin Gounden -->
 <!-- Student Number: u21458686 -->
<?php
 session_start();
 if ((!isset($_SESSION["apikey"])))
 {
    header("Location: /PA4/login.php");
    exit();
 }
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarSpace: Your number one car comparison website!</title>
    <link id ="theme-link" rel="stylesheet" href="css/dark/BrandStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap"
      rel="stylesheet">
  </head>
  <body>
    <div class="container">
     
    <header>
    <?php
      //using inlcude function to stitch navbar to index page
      include_once "php/header.php";
      ?>
    </header>

      <section class="brands" id="brands">
        <div class="heading">
          <span>Search our incredible brands</span>
          <h2>We have a variety of brands to choose from!</h2>
          <p>
            At CarSpace we strive to house the most reputable and reliable
            brands for our consumers to compare.
          </p>
        </div>

        <div class="brands_container">
          <div class="box">
            <img src="img/loading.gif" alt="audi" id ="audi">
            <h2>Audi &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="bmw" id="bmw">
            <h2>BMW &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="hyundai" id = "hyundai">
            <h2>Hyundai &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="mercedes" id = "mercedes">
            <h2>Mercedes &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="renault" id = "renault">
            <h2>Renault &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="ford" id = "ford">
            <h2>Ford &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="toyota" id = "toyota">
            <h2>Toyota &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="volkswagen" id = "volkswagen">
            <h2>Volkswagen &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="honda" id = "honda">
            <h2>Honda &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="ferrari" id = "ferrari">
            <h2>Ferrari &#x2192;</h2>
          </div>


          <div class="box">
            <img src="img/loading.gif" alt="fiat" id = "fiat">
            <h2>Fiat &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="gmc" id = "gmc">
            <h2>GMC &#x2192;</h2>
          </div>


          <div class="box">
            <img src="img/loading.gif" alt="isuzu" id = "isuzu">
            <h2>Isuzu &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="jaguar" id = "jaguar">
            <h2>Jaguar &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="jeep" id = "jeep">
            <h2>Jeep &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="kia" id = "kia">
            <h2>Kia &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="lamborghini" id = "lamborghini">
            <h2>Lamborghini &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="lexus" id = "lexus">
            <h2>Lexus &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="lotus" id = "lotus">
            <h2>Lotus &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="mahindra" id = "mahindra">
            <h2>Mahindra &#x2192;</h2>
          </div>

          <div class="box">
            <img src="img/loading.gif" alt="mitsubishi" id = "mitsubishi">
            <h2>Mitsubishi &#x2192;</h2>
          </div>


        </div>
    

      </section>
    </div>

    <footer>
        <?php
        include_once "php/footer.php";
        ?>
    </footer>
    <script src="js/brands.js"></script>
  </body>
</html>
