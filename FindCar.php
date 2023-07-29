
 
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
<link id ="theme-link" rel="stylesheet" href="css/dark/FindCar.css" >
<link rel="preconnect" href="https://fonts.googleapis.com" >
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
<link
  href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap"
  rel="stylesheet"
>

	<title>CarSpace: Your number one car comparison website!</title>
</head>


<body>
    <div class="container">

    <header>
    <?php
      //using inlcude function to stitch navbar to index page
      include_once "php/header.php";
      ?>
    </header>

          <div class="typewriter">
            <h1>Find your perfect vehicle!</h1>
          </div>
      
    <div class="layout">
    <form class = "find_car_form">
      <label>Do you want a vehicle with all wheel drive?</label>
    <div class="all_wheel">
      <input type="radio" name="all_wheel" value="yes"> Yes
      <input type="radio" name="all_wheel" value="no"> No
    </div>

    <label>Do you want an infotainment system?</label>
    <div class="infotainment">
      <input type="radio" name="infotainment" value="yes"> Yes
      <input type="radio" name="infotainment" value="no"> No
    </div>
    
    <label>Would you like an automatic or manual transmission vehicle?</label>
<div class="transmission">
  <input type="radio" name="transmission" value="automatic"> Automatic
  <input type="radio" name="transmission" value="manual"> Manual
</div>
     

      <label>Select the type of vehicle you would like:</label>
      
      <div class="select">
        <select name="car-type">
          <option value="">Select a vehicle type &#x2193;</option>
          <option value="sedan">Sedan</option>
          <option value="suv">SUV</option>
          <option value="truck">4x4</option>
          <option value="sports-car">Convertable</option>
        </select>
      </div>
        
      

      <label>Select the brand of your vehicle:</label>
      <select name="car-brand">
        <option value="">Select a vehicle brand &#x2193;</option>
        <option value="audi">Audi</option>
        <option value="bmw">BMW</option>
        <option value="hyundai">Hyundai</option>
        <option value="mercedes">Mercedes</option>
        <option value="renault">Renault</option>
        <option value="ford">Ford</option>
        <option value="toyota">Toyota</option>
        <option value="volkswagen">Volkswagen</option>
        <option value="honda">Honda</option>
      </select>

     
      <label>What is the budget for your vehicle?</label>
      <input type="range" name="budget"><br>

      <input class = "find_cars_btn" type="submit" value="Find Cars &#x2192;">
    
        

    <div id="car_results">
      <div class="car_container">
        <h2>Search results:</h2>
        <div class="brands_container">
          <div class="box">
            <img src="img/audi.png" alt="audi">
           
          </div>

          <div class="box">
            <img src="img/bmw.png" alt="bmw">
           
          </div>

          <div class="box">
            <img src="img/hyundai.png" alt="hyundai">
           
          </div>

          <div class="box">
            <img src="img/mercedes.png" alt="mercedes">
            
          </div>

          <div class="box">
            <img src="img/renault.png" alt="renault">
            
          </div>

          <div class="box">
            <img src="img/ford.png" alt="ford">
           
          </div>

          <div class="box">
            <img src="img/toyota.png" alt="toyota">
            
          </div>

          <div class="box">
            <img src="img/volkswagen.png" alt="volkswagen">
           
          </div>

          <div class="box">
            <img src="img/honda.png" alt="honda">

            </div>

            
          </div>
        
     

      </div>

    </div>

   

  </form>

    
    </div>
    
    
    </div>

    
</body>


<footer>
        <?php
        include_once "php/footer.php";
        ?>
        </footer>
</html>
