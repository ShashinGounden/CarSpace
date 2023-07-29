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
	<link rel="preconnect" href="https://fonts.googleapis.com" >
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin >
	<link
	href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700&display=swap"
	rel="stylesheet"
	>
	<link id ="theme-link" rel="stylesheet" href="css/dark/CompareStyle.css" >
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
			<h3><i>Not sure which car to pick?</i></h3>
			<h1>We've got you covered</h1>
			<p>CarSpace has a variety of cars you can compare to each other! Not sure which car is more expense? No problem. Compare today!</p>
		  </div>

		  <div class="fulltable">
			<div id="tableWrapper1">
				<table>
					<thead>
						<tr class = "CT_header">
							<th colspan="3">Car Comparison Tool</th>
						</tr>
						<tr>
							<th>Search for car</th>
							
							<td>Find Car 1: <input class ="CarSearch" type="search" id="searchCar1" name="searchCar1" placeholder="Click to search..."> <a href="#"><img class="searchIcon" width="23" src="img/search.png" alt="Search" id ="imgSearchCar1"></a></td>
							
				
						</tr>
		
						
					</thead>
					<tbody>
						<tr>
							<th>Make</th>
							<td class="car1">BMW X5 E53</td>
			
						</tr>
						<tr>
							<th>Car</th>
							<td><img class ="carImg" src="img/bmw.png" alt="Car 1" width="150"></td>
							
							
						</tr>
						<tr>
							<th>Model</th>
							<td>E95</td>
							
							
						</tr>
						<tr>
							<th>Year from</th>
							<td>2017</td>
							
							
						</tr>
						<tr>
							<th>Year To</th>
							<td>2020</td>
							
							
						</tr>
						<tr>
							<th>Top Speed</th>
							<td>300</td>
							
							
						</tr>
						<tr>
							<th>Transmission</th>
							<td>Automatic</td>
							
							
						</tr>
						<tr>
							<th>Engine Type</th>
							<td>Gasoline</td>
							
						
						</tr>
					</tbody>
				</table>
			  </div>
	
			  <div id="tableWrapper2">
				<table>
					<thead>
						<tr class = "CT_header">
							<th colspan="3">Car Comparison Tool</th>
						</tr>
						<tr>
							<th>Search for car</th>
							
						
							
							<td>Find Car 2: <input class ="CarSearch" type="search" id="searchCar2" name="searchCar2" placeholder="Click to search..."><a href="#"><img class="searchIcon" width="23" src="img/search.png" alt="Search" id ="imgSearchCar2"></a></td>
						</tr>
		
						
					</thead>
					<tbody>
						<tr>
							<th>Make</th>
							
							<td class="car2">Audi A6</td>
						</tr>
						<tr>
							<th>Car</th>
							
							<td><img class ="carImg" src="img/audi.png" alt="Car 2" width="170"></td>
							
						</tr>
						<tr>
							<th>Model</th>
							
							<td>A4</td>
							
						</tr>
						<tr>
							<th>Year from</th>
							
							<td>2018</td>
							
						</tr>
						<tr>
							<th>Year To</th>
							
							<td>2021</td>
							
						</tr>
						<tr>
							<th>Top Speed</th>
							
							<td>252</td>
							
						</tr>
						<tr>
							<th>Transmission</th>
				
							<td>Manual</td>
							
						</tr>
						<tr>
							<th>Engine Type</th>
							
							<td>Gasoline</td>
						
						</tr>
					</tbody>
				</table>
			  </div>
		  </div>
		  
		  
		  
		  
	</div>

	<footer>
        <?php
        include_once "php/footer.php";
        ?>
    </footer>
	
	<script src="js/compare.js"></script>
</body>
</html>





