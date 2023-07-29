/* Load car images */
function loadCarImage(id, make, model)
{
    var reqCar = new XMLHttpRequest();
    reqCar.onreadystatechange = function()
    {
        if (reqCar.readyState == 4 && reqCar.status == 200)
        {
            var resCar = reqCar.responseText;
            document.getElementById(id).src = resCar;
            console.log(resCar);
        }
    }

    let connection_string = "https://wheatley.cs.up.ac.za/api/getimage?brand=" + make + "&model=" + model;

    reqCar.open("GET", connection_string, true);
    reqCar.send();
}


/*Search functionality for car 1*/
const btn_search = document.getElementById("imgSearchCar1");

btn_search.addEventListener("click", (e) => 
{
    
  e.preventDefault();
  let modelSearch = document.getElementById("searchCar1").value;

  var myJSON = 
  {
    "studentnum":"u21458686",
    "type":"GetAllCars",
    "return": 1,
    "apikey":"a9198b68355f78830054c31a39916b7f",
    "search":{
        "model": modelSearch
    },
    "fuzzy": true,
    return: ["id_trim", "make", "model", "max_speed_km_per_h", "year_to", "year_from", "transmission", "engine_type", "body_type"]
};
  
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) 
    {
      let res = JSON.parse(req.responseText);

      console.log(res);
      
      let output_html = "";
      
      let wrapper = document.getElementById("tableWrapper1");
      wrapper.innerHTML = "";

      if (res.status == "success") 
      {
        res.data.forEach(c => 
            {
            output_html += ` <div id="tableWrapper1">
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
						<td class="car1">${c.make}</td>
		
					</tr>
					<tr>
						<th>Car</th>
						<td><img class ="carImg" src="img/bmw.png" alt="Car 1" width="150" id = "${c.make}-${c.model}"></td>
						
						
					</tr>
					<tr>
						<th>Model</th>
						<td>${c.model}</td>
						
						
					</tr>
					<tr>
						<th>Year from</th>
						<td>${c.year_from}</td>
						
						
					</tr>
					<tr>
						<th>Year To</th>
						<td>${c.year_to}</td>
						
						
					</tr>
					<tr>
						<th>Top Speed</th>
						<td>${c.max_speed_km_per_h}</td>
						
						
					</tr>
					<tr>
						<th>Transmission</th>
						<td>${c.transmission}</td>
						
						
					</tr>
					<tr>
						<th>Engine Type</th>
						<td>${c.engine_type}</td>
						
					
					</tr>
				</tbody>
			</table>
		  </div>
    `
    loadCarImage(`${c.make}-${c.model}`,`${c.make}`,`${c.model}`);
        });


      } 

      wrapper.innerHTML = output_html;
    }
  };

  req.open("POST", "https://wheatley.cs.up.ac.za/api/", false);
  req.send(JSON.stringify(myJSON));
});


/*Search functionality for car 2*/
const btnC2 = document.getElementById("imgSearchCar2");

btnC2.addEventListener("click", (e) => 
{
    
  e.preventDefault();
  let modelSearch = document.getElementById("searchCar2").value;

  var myJSON = 
  {
    "studentnum":"u21458686",
    "type":"GetAllCars",
    "return": 1,
    "apikey":"a9198b68355f78830054c31a39916b7f",
    "search":{
        "model": modelSearch
    },
    "fuzzy": true,
    return: ["id_trim", "make", "model", "max_speed_km_per_h", "year_to", "year_from", "transmission", "engine_type", "body_type"]
};
  
  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) 
    {
      let res = JSON.parse(req.responseText);

      console.log(res);
      
      let output_html = "";
      
      let wrapper = document.getElementById("tableWrapper2");
      wrapper.innerHTML = "";

      if (res.status == "success") 
      {
        res.data.forEach(c => 
            {
            output_html += ` <div id="tableWrapper1">
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
						<td class="car1">${c.make}</td>
		
					</tr>
					<tr>
						<th>Car</th>
						<td><img class ="carImg" src="img/bmw.png" alt="Car 1" width="150" id = "${c.make}-${c.model}"></td>
						
						
					</tr>
					<tr>
						<th>Model</th>
						<td>${c.model}</td>
						
						
					</tr>
					<tr>
						<th>Year from</th>
						<td>${c.year_from}</td>
						
						
					</tr>
					<tr>
						<th>Year To</th>
						<td>${c.year_to}</td>
						
						
					</tr>
					<tr>
						<th>Top Speed</th>
						<td>${c.max_speed_km_per_h}</td>
						
						
					</tr>
					<tr>
						<th>Transmission</th>
						<td>${c.transmission}</td>
						
						
					</tr>
					<tr>
						<th>Engine Type</th>
						<td>${c.engine_type}</td>
						
					
					</tr>
				</tbody>
			</table>
		  </div>
    `
    loadCarImage(`${c.make}-${c.model}`,`${c.make}`,`${c.model}`);
        });


      } 

      wrapper.innerHTML = output_html;
    }
  };

  req.open("POST", "https://wheatley.cs.up.ac.za/api/", false);
  req.send(JSON.stringify(myJSON));
});

	






