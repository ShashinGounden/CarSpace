var currentTheme = getCookie("theme");

if (currentTheme == null)
{
    setTheme("dark");
}
else
{
    if (currentTheme == "dark")
    {
        setTheme("dark");
    }
    else
    {
        setTheme("light");
    }
}

// Add event listener for the theme toggle button
document.getElementById("toggle-theme-btn").addEventListener("click", function() 
{

    // Toggle between light and dark themes
    if (currentTheme === "light") 
    {
        setTheme("dark");
    } 
    else 
    {
        setTheme("light");
    }
});

// Function to set the theme and store the preference in a cookie
function setTheme(theme) 
{
    // Update the theme link in the head of the HTML document
    
    //get current reference to css file
    var currentCSSRef = document.getElementById("theme-link").href;
    
    if (theme === "light")
    {
        var newCSSRef = currentCSSRef.replace("dark","light");
        document.getElementById("theme-link").href = newCSSRef;
    }
    else if (theme === "dark")
    {
        var newCSSRef = currentCSSRef.replace("light","dark");
        document.getElementById("theme-link").href = newCSSRef;
    }


    // Store the theme preference in a cookie that expires in 30 days

 
    setCookie("theme", theme, 365);
    
    // Update the currentTheme variable
    currentTheme = theme;
}

// Function to retrieve a cookie by name
function getCookie(name) 
{
    var cookieArr = document.cookie.split("; ");
    for (var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        if (cookiePair[0] === name) {
            return cookiePair[1];
        }
    }
    return null;
}

// Function to set a cookie
function setCookie(name, value, days) 
{
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}