<!-- Name: Shashin Gounden -->
<!-- Student Number: u21458686 -->
<?php
 session_start();
 if (!isset($_SESSION["apikey"]))
 {
    header("Location: /PA4/login.php");
    exit();
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CarSpace: Your number one car comparison website!</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id ="theme-link" rel="stylesheet" href="css/dark/style.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com" >
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap"
      rel="stylesheet"
    >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    
    <div class="container">
      
    <header>
    <?php
      //using inlcude function to stitch navbar to index page
      include_once "php/header.php";
      ?>
    </header>
   

      <form class="search_bar">
        <input type="search" placeholder="Search for a car model..." id="mySearch" name="q">

      
        <div class="select-menu">
          <select name="transmission" id ="transmission">
            <option value="" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[0] === "") { echo 'selected'; }; ?> >Select transmission &#x2193;</option>
            <option value="auto" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[0] === "auto") { echo 'selected'; }; ?>>Automatic</option>
            <option value="manual" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[0] === "manual") { echo 'selected'; }; ?>>Manual</option>
          </select>
        </div>

   
          
        <div class="select-menu">
        <select name="engine_type" id ="engine_type">
          <option value="" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[1] === "") { echo 'selected'; }; ?>>Select engine type &#x2193;</option>
          <option value="gasoline" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[1] === "gasoline") { echo 'selected'; }; ?>>Gasoline</option>
          <option value="diesel" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[1] === "diesel") { echo 'selected'; }; ?>>Diesel</option>
          <option value="hybrid" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[1] === "hybrid") { echo 'selected'; }; ?>>Hybrid</option>
          <option value="electric" <?php if (isset($_SESSION['preferences']) && explode(",", $_SESSION['preferences'])[1] === "electric") { echo 'selected'; }; ?>>Electric</option>
        </select> 
        </div>

       

        

        <button type="submit" value="Search for a car" id ="searchCar">
          <img src="img/search.png" alt = "Search Button">
        </button>

       
      </form>

      <?php 
        if(isset($_SESSION["apikey"]))
          echo ('<button id="saveFilters" type = "submit">Save filters</button>');
      ?>

      <div class="sort_by">
        <p>Sort by:</p>
        <label>
          <input type="checkbox" class="sort_by_checkbox" id ="sort_name" >
          Name
        </label>

        <label>
          <input type="checkbox" class="sort_by_checkbox" id ="sort_year">
          Year
        </label>
      </div>
      

      <div id="cars_wrapper">

     
      <div class="car_container">
        <div class="stats">
          <div class="brand">
            <h1>BMW</h1>
            <h5>Brand</h5>
          </div>

          <div class="model">
            <h1>X5 E53</h1>
            <h5>Model</h5>
          </div>

          <div class="model_year">
            <h1>2017</h1>
            <h5>Year</h5>
          </div>

          <div class="top_speed">
            <h1>243 KM/h</h1>
            <h5>Top Speed</h5>
          </div>

          <div class="horse_power">
            <h1>Automatic</h1>
            <h5>Transmission</h5>
          </div>

          <div class="fuel_consumption">
            <h1>Gasoline</h1>
            <h5>Engine Type</h5>
          </div>
        </div>

        <div class="car">
          <div class="circle">
            <img class="car_img" src="img/loading.gif" alt="car" >
            <div class="inner-md-circle"></div>
            <div class="inner-sm-circle"></div>
          </div>
        </div>
      </div>

      <div class="car_container">
        <div class="stats">
          <div class="brand">
            <h1>Audi</h1>
            <h5>Brand</h5>
          </div>

          <div class="model">
            <h1>A6</h1>
            <h5>Model</h5>
          </div>

          <div class="model_year">
            <h1>2018</h1>
            <h5>Year</h5>
          </div>

          <div class="top_speed">
            <h1>250 KM/h</h1>
            <h5>Top Speed</h5>
          </div>

          <div class="horse_power">
            <h1>252</h1>
            <h5>Horse Power</h5>
          </div>

          <div class="fuel_consumption">
            <h1>5.7 km/l</h1>
            <h5>Fuel Consumption</h5>
          </div>
        </div>

        <div class="car">
          <div class="circle">
            <img class="car_img" src="img/loading.gif" alt="car" >
            <div class="inner-md-circle"></div>
            <div class="inner-sm-circle"></div>
          </div>
        </div>
      </div>

      <div class="car_container">
        <div class="stats">
          <div class="brand">
            <h1>Hyundai</h1>
            <h5>Brand</h5>
          </div>

          <div class="model">
            <h1>Tuscon</h1>
            <h5>Model</h5>
          </div>

          <div class="model_year">
            <h1>2019</h1>
            <h5>Year</h5>
          </div>

          <div class="top_speed">
            <h1>175 KM/h</h1>
            <h5>Top Speed</h5>
          </div>

          <div class="horse_power">
            <h1>164</h1>
            <h5>Horse Power</h5>
          </div>

          <div class="fuel_consumption">
            <h1>7.8 km/l</h1>
            <h5>Fuel Consumption</h5>
          </div>
        </div>

        <div class="car">
          <div class="circle">
            <img class="car_img" src="img/loading.gif" alt="car" >
            <div class="inner-md-circle"></div>
            <div class="inner-sm-circle"></div>
          </div>
        </div>
      </div>

      <div class="car_container">
        <div class="stats">
          <div class="brand">
            <h1>Mercedes</h1>
            <h5>Brand</h5>
          </div>

          <div class="model">
            <h1>CLA</h1>
            <h5>Model</h5>
          </div>

          <div class="model_year">
            <h1>2017</h1>
            <h5>Year</h5>
          </div>

          <div class="top_speed">
            <h1>250 KM/h</h1>
            <h5>Top Speed</h5>
          </div>

          <div class="horse_power">
            <h1>208</h1>
            <h5>Horse Power</h5>
          </div>

          <div class="fuel_consumption">
            <h1>15.04 km/l</h1>
            <h5>Fuel Consumption</h5>
          </div>
        </div>

        <div class="car">
          <div class="circle">
            <img class="car_img" src="img/loading.gif" alt="car" >
            <div class="inner-md-circle"></div>
            <div class="inner-sm-circle"></div>
          </div>
        </div>
      </div>

      <div class="car_container">
        <div class="stats">
          <div class="brand">
            <h1>Renault</h1>
            <h5>Brand</h5>
          </div>

          <div class="model">
            <h1>Captur</h1>
            <h5>Model</h5>
          </div>

          <div class="model_year">
            <h1>2020</h1>
            <h5>Year</h5>
          </div>

          <div class="top_speed">
            <h1>196 KM/h</h1>
            <h5>Top Speed</h5>
          </div>

          <div class="horse_power">
            <h1>140</h1>
            <h5>Horse Power</h5>
          </div>

          <div class="fuel_consumption">
            <h1>5.4 km/l</h1>
            <h5>Fuel Consumption</h5>
          </div>
        </div>

        <div class="car">
          <div class="circle">
            <img class="car_img" src="img/loading.gif" alt="car" >
            <div class="inner-md-circle"></div>
            <div class="inner-sm-circle"></div>
          </div>
        </div>

      </div>
      
      </div>
    </div>

    <footer>
        <?php
        include_once "php/footer.php";
        ?>
    </footer>

    <script src="js/index.js"></script>
  </body>
</html>

