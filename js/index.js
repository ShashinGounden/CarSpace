/* Load car images */
//function not needed since img url is returned with the API created
/* unction loadCarImage(id, make, model)
{
    var req = new XMLHttpRequest();
    req.onreadystatechange = function()
    {
        if (req.readyState == 4 && req.status == 200)
        {
            var res = req.responseText;
            document.getElementById(id).src = res;
            console.log(res);
        }
    }

    let connection_string = "https://wheatley.cs.up.ac.za/api/getimage?brand=" + make + "&model=" + model;

    req.open("GET", connection_string, true);
    req.send();
}  */

/*Populate 20 cars*/
function loadCars() 
{
  let myJSON = 
  {
    type: "GetAllCars",
    apikey: getCookie("apikey"),
    limit: 20,
    fuzzy: true,
    return: ["id_trim", "make", "model", "max_speed_km_per_h", "year_to", "year_from", "transmission", "engine_type", "image"]
  };

  var req = new XMLHttpRequest();
  var id_trim;
  req.onreadystatechange = function () 
  {
    if (req.readyState == 4 && req.status == 200) 
    {
      let res = JSON.parse(req.responseText);

      let output_html = "";
      let wrapper = document.getElementById("cars_wrapper");
      wrapper.innerHTML = "";

      if (res.status == "success") 
      {
        res.data.forEach(c => 
          {
            output_html += `<div class="car_container">
            <div class="stats">
              <div class="brand">
                <h1>${c.make}</h1>
                <h5>Brand</h5>
              </div>
    
              <div class="model">
                <h1>${c.model}</h1>
                <h5>Model</h5>
              </div>
    
              <div class="model_year">
                <h1>${c.year_from} to ${c.year_to}</h1>
                <h5>Year</h5>
              </div>
    
              <div class="top_speed">
                <h1>${c.max_speed_km_per_h} KM/h</h1>
                <h5>Top Speed</h5>
              </div>
    
              <div class="horse_power">
                <h1>${c.transmission}</h1>
                <h5>Transmission</h5>
              </div>
    
              <div class="fuel_consumption">
                <h1>${c.engine_type}</h1>
                <h5>Engine Type</h5>
              </div>
            </div>
    
            <div class="car">
              <div class="circle">
                <img class="car_img" src = "${c.image}" id="${c.make}-${c.model}" alt="car">
                <div class="inner-md-circle"></div>
                <div class="inner-sm-circle"></div>
              </div>
            </div>

            <h5>Rate this car:</h5>
            <div class = "rating">
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star1" value = "star1">
            <label for="star1"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star2" value = "star2">
            <label for="star2"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star3" value = "star3">
            <label for="star3"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star4" value = "star4">
            <label for="star4"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star5" value = "star5">
            <label for="star5"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star6" value = "star6">
            <label for="star6"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star7" value = "star7">
            <label for="star7"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star8" value = "star8">
            <label for="star8"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star9" value = "star9">
            <label for="star9"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star10" value = "star10">
            <label for="star10"></label>

            </div>

          </div>

        
    `
           // loadCarImage(`${c.make}-${c.model}`,`${c.make}`,`${c.model}`);
            //ALTER TABLE `userRatings` ADD CONSTRAINT `fk_id_trim` FOREIGN KEY(`id_trim`) REFERENCES cars(`id_trim`);
         //  id_trim = c.id_trim;
        });
      }

      wrapper.innerHTML = output_html;
    }

    //rating system]

    const stars = document.querySelectorAll('input[class^="star"]');
    var starRating = [10,9,8,7,6,5,4,3,2,1];
   
    for (let i = 0; i < stars.length; i++) 
    {

      stars[i].addEventListener('click', function(e) 
      {
          
          rating = starRating[i%10];
          sendRating(rating, e.srcElement.className.split('-')[1]);
        
      });
    }
  };


  req.open("POST", "https://wheatley.cs.up.ac.za/u21458686/api.php", true);
  req.setRequestHeader('Authorization', 'Basic ' + "dTIxNDU4Njg2OkJJR2Jhbmc3Nw==");
 req.send(JSON.stringify(myJSON));

}

//loadCars();


/*Search functionality and sort functionality and filterable functionality*/
const btn_search = document.getElementById("searchCar");
const chk_name = document.getElementById("sort_name");
const chk_year = document.getElementById("sort_year");
var searchParameters = "";

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


// Function to set a cookie
function setCookie(name, value, days) 
{
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}


function refreshCars(isUpdated){




  let modelSearch = document.getElementById("mySearch").value;
  let transmissionFilter = document.getElementById("transmission").options[[document.getElementById("transmission").selectedIndex]].value;
  let engineFilter = document.getElementById("engine_type").options[document.getElementById("engine_type").selectedIndex].value;

  if (isUpdated){
    transmissionFilter = window.localStorage.getItem("preferences").split(",")[0];
    engineFilter = window.localStorage.getItem("preferences").split(",")[1];
    //update selected 
    transmissionOption = document.querySelector(`option[value="${transmissionFilter}"]`).setAttribute("selected","selected");
    engineOption = document.querySelector(`option[value="${engineFilter}"]`).setAttribute("selected","selected");
  }

  //todo empty apikey redirect login

  var myJSON = 
  {
    "type":"GetAllCars",
    "apikey":getCookie("apikey"),
    limit: 20,
    "fuzzy": true,
    "search" : 
    {
      "model" : modelSearch
    }, 
    return: ["id_trim", "make", "model", "max_speed_km_per_h", "year_to", "year_from", "transmission", "engine_type", "image"]
  };

  if (transmissionFilter == "auto")
  {
    myJSON["transmission"] = "Automatic";
  }
  else if (transmissionFilter == "manual")
  {
    myJSON["transmission"] = "Manual";
  }


  if (engineFilter == "gasoline")
  {
      myJSON["engine_type"] = "Gasoline";
  }
  else if (engineFilter == "diesel")
  {
    myJSON["engine_type"] = "Diesel";
  }
  else if (engineFilter == "electric")
  {
    myJSON["engine_type"] = "Electric";
  }
  else if (engineFilter == "hybrid")
  {
    myJSON["engine_type"] = "Hybrid";
  }

  
  var ModelSort = false;
  var YearSort = false;

  if (chk_name.checked)
  {
    ModelSort = true;
  }

  if (chk_year.checked)
  {
    YearSort = true;
  }


  if (ModelSort && YearSort)
  {
    myJSON['sort'] = ['model', 'year_from'];
    myJSON['order'] = "ASC";
  }
  else if (ModelSort && !YearSort)
  {
    myJSON['sort'] = ['model'];
    myJSON['order'] = "ASC";
  }
  else if (!ModelSort && YearSort)
  {
    myJSON['sort'] = ['year_from'];
    myJSON['order'] = "DESC";
  }



  var req = new XMLHttpRequest();

  req.onreadystatechange = function () 
  {
    if (req.readyState == 4 && req.status == 200) 
    {
      let res = JSON.parse(req.responseText);
      sortResp = res;
      let output_html = "";
      let wrapper = document.getElementById("cars_wrapper");
      wrapper.innerHTML = "";

      if (res.status == "success") {
        if (res.data != null)
        {
          res.data.forEach(c => {
            output_html += `<div class="car_container">
            <div class="stats">
              <div class="brand">
                <h1>${c.make}</h1>
                <h5>Brand</h5>
              </div>
    
              <div class="model">
                <h1>${c.model}</h1>
                <h5>Model</h5>
              </div>
    
              <div class="model_year">
                <h1>${c.year_from} to ${c.year_to}</h1>
                <h5>Year</h5>
              </div>
    
              <div class="top_speed">
                <h1>${c.max_speed_km_per_h} KM/h</h1>
                <h5>Top Speed</h5>
              </div>
    
              <div class="horse_power">
                <h1>${c.transmission}</h1>
                <h5>Transmission</h5>
              </div>
    
              <div class="fuel_consumption">
                <h1>${c.engine_type}</h1>
                <h5>Engine Type</h5>
              </div>
            </div>
    
            <div class="car">
              <div class="circle">
                <img class="car_img" src = "${c.image}" alt="car" >
                <div class="inner-md-circle"></div>
                <div class="inner-sm-circle"></div>
              </div>
            </div>
            
            <h5>Rate this car:</h5>
            <div class = "rating">
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star1" value = "star1">
            <label for="star1"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star2" value = "star2">
            <label for="star2"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star3" value = "star3">
            <label for="star3"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star4" value = "star4">
            <label for="star4"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star5" value = "star5">
            <label for="star5"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star6" value = "star6">
            <label for="star6"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star7" value = "star7">
            <label for="star7"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star8" value = "star8">
            <label for="star8"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star9" value = "star9">
            <label for="star9"></label>
            <input class = "star-${c.id_trim}" type="radio" name="star" id="star10" value = "star10">
            <label for="star10"></label>

            </div>
          </div>
    `
          //loadCarImage(`${c.make}-${c.model}`,`${c.make}`,`${c.model}`);
        });
        }
        wrapper.innerHTML = output_html;  
      } 

      

      const stars = document.querySelectorAll('input[class^="star"]');
        var starRating = [10,9,8,7,6,5,4,3,2,1];
   
        for (let i = 0; i < stars.length; i++) {

          stars[i].addEventListener('click', function(e) {
            rating = starRating[i%10];
            sendRating(rating, e.srcElement.className.split('-')[1]);
          });
        }

      if (wrapper.innerHTML == "")
      {wrapper.innerHTML = "<div class='error-container'><h1>No results found.</h1><p>The car you are searching for could not be found. Please try again with different filters or make sure the model is spelt correctly.</p></div>";
      }
    }
  };

  req.open("POST", "https://wheatley.cs.up.ac.za/u21458686/api.php", true);
  req.setRequestHeader('Authorization', 'Basic ' + "dTIxNDU4Njg2OkJJR2Jhbmc3Nw==", 'Content-Type', 'Content-Type: application/json');
  req.send(JSON.stringify(myJSON));
}

window.onload = function(){
  var transmission = document.getElementById("transmission").value;
  var engine = document.getElementById("engine_type").value;
  if (engine == "" && transmission =="" ){
    loadCars();
    return;
  }

  refreshCars(true);
}


btn_search.addEventListener("click", (e) => 
{

  e.preventDefault();

  refreshCars(false);
});


function sendRating(rating, id_trim) 
{
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "https://wheatley.cs.up.ac.za/u21458686/api.php", true);
  xhr.setRequestHeader('Authorization', 'Basic ' + "dTIxNDU4Njg2OkJJR2Jhbmc3Nw==", 'Content-Type', 'Content-Type: application/json');
  xhr.onreadystatechange = function() 
  {
    if (xhr.readyState === 4 && xhr.status === 200) 
    {
      alert(xhr.responseText);
    }
  };
  

  const data = 
  {
    type : 'rate',
    apikey : getCookie("apikey"),
    rating : rating,
    id_trim : id_trim
  };
  
  xhr.send(JSON.stringify(data));
}

//function for saving preferences
var savePreferenceBtn = document.getElementById("saveFilters");
savePreferenceBtn.addEventListener("click", function()
{
  var transmission = document.getElementById("transmission").value;
  var engine = document.getElementById("engine_type").value;

  var preferencesArray = new Array();

    preferencesArray.push(transmission);
    preferencesArray.push(engine);
  

  sendPreferences(preferencesArray);
})

function sendPreferences(preferencesArray)
{
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "https://wheatley.cs.up.ac.za/u21458686/api.php", true);
  xhr.setRequestHeader('Authorization', 'Basic ' + "dTIxNDU4Njg2OkJJR2Jhbmc3Nw==", 'Content-Type', 'Content-Type: application/json');
  xhr.onreadystatechange = function() 
  {
    if (xhr.readyState === 4 && xhr.status === 200) 
    {
      alert("Preferences updated");
      let res = JSON.parse(xhr.responseText);
      if (res['status'] == "success"){
        window.localStorage.setItem("preferences", res['data'])
      }
      refreshCars(true);
    }
  };
  
  const data = 
  {
    type : 'update',
    apikey : getCookie("apikey"),
    preferences: preferencesArray
  };
  
  xhr.send(JSON.stringify(data));
  
}





