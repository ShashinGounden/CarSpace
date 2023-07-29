/*Used asynchronous calls for both images and date, so all data and images lpad at the same time. You then won't have to wait for all images have loaded before you can view the site.*/

function loadBrandImage(id, name)
{
    var req = new XMLHttpRequest();
    req.onreadystatechange = function()
    {
        if (req.readyState == 4 && req.status == 200)
        {
            var res = req.responseText;
            document.getElementById(id).src = res;
        }
    }
    
    // let connection_string = "https://wheatley.cs.up.ac.za/api/getimage?brand=" + na

    req.open("GET", "https://wheatley.cs.up.ac.za/api/getimage?brand=" + name, true);
    req.send();
}

function loadPageData()
{
    loadBrandImage("audi", "audi");
    loadBrandImage("bmw", "bmw");
    loadBrandImage("hyundai", "hyundai");
    loadBrandImage("mercedes", "mercedes-benz");
    loadBrandImage("renault", "renault");
    loadBrandImage("ford", "ford");
    loadBrandImage("toyota", "toyota");
    loadBrandImage("volkswagen", "volkswagen");
    loadBrandImage("honda", "honda");
    loadBrandImage("ferrari", "ferrari");
    loadBrandImage("fiat", "fiat");
    loadBrandImage("gmc", "gmc");
    loadBrandImage("isuzu", "isuzu");
    loadBrandImage("jaguar", "jaguar");
    loadBrandImage("jeep", "jeep");
    loadBrandImage("kia", "kia");
    loadBrandImage("lamborghini", "lamborghini");
    loadBrandImage("lexus", "lexus");
    loadBrandImage("lotus", "lotus");
    loadBrandImage("mahindra", "mahindra");
    loadBrandImage("mitsubishi", "mitsubishi");
}

loadPageData();




