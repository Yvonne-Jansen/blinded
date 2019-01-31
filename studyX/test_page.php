<?php header("Cache-Control: no-cache, must-revalidate");
$start_code = $_GET["start_code"];
if (!$start_code) {
    $start_code = "empty";}
else if (hexdec($start_code) < 710000 or hexdec($start_code) > 712450){
        $start_code = 'empty';
    }
echo '<input type="hidden" id="start_code" value="' . "" . $start_code .  '"/>';

?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Empty Project</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    
    
    
    <body>
    
<noscript><h2>You need to activate JavaScript to participate in this study!</h2><h2>Please activate javascript and reload this page.</h2></noscript>

<h2 id="window_too_narrow">Your browser window is not wide enough. Please make the window wider until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<h2 id="window_too_short">Your browser window is not high enough. Please increase the height of this window  until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<h2 id="window_too_small">Your browser window is too small. Please increase both the height and width of this window  until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<div id="button_box"><button onclick="start()" id="start_button" style="display: none">Click here when you are ready to start</button></div>

<script>
var start_code = document.getElementById("start_code").value;
function checkCookies() {
    var cookieEnabled = false; // = navigator.cookieEnabled;
    if (!cookieEnabled){ 
        document.cookie = "testCookies";
        cookieEnabled = document.cookie.indexOf("testCookies")!=-1;
    }
    if (cookieEnabled) {
        if (!start_code || start_code === "empty") {
            document.write("<h2>You opened this page with an invalid link.</h2>");
            return false;
        } else if (window.innerWidth < 700 || window.innerHeight < 700) {
            setInterval(checkWindowSize, 1000);
            return false;
        }else {
            document.getElementById("start_button").style.display = "block";
        }
    }
    return cookieEnabled || showCookieFail();
}

function checkWindowSize() {
    if (window.innerWidth < 700 || window.innerHeight < 700) {
        return false;
    } else {
        clearInterval();
        document.getElementById("start_button").style.display = "block";
    }
}
function showCookieFail(){
  document.write("<h2>You need to allow cookies from this page to participate in this study.</h2> <h2>Please activate cookies and reload this page.</h2>");
}

function start() {
    window.location.replace("./index.php" + "?start_code=" + start_code);

}
checkCookies();
</script>


</body>
</html>
