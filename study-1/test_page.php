<?php 
$start_code = $_GET["start_code"];
if (!$start_code) {
    $start_code = "empty";}

echo '<input type="hidden" id="start_code" value="' . "" . $start_code .  '"</input>';

?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Empty Project</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    
    
    
    <body>
    
<noscript><h2>You need to activate JavaScript to participate in this study!</h2><h2>Please activate javascript and reload this page.</h2></noscript>



<script>
function checkCookies() {
    var cookieEnabled = false; // = navigator.cookieEnabled;
    if (!cookieEnabled){ 
        document.cookie = "testCookies";
        cookieEnabled = document.cookie.indexOf("testCookies")!=-1;
    }
    if (cookieEnabled) {
        var start_code = document.getElementById("start_code").value;
        if (!start_code || start_code === "empty") {
            document.write("<h2>You opened this page with an invalid link. Try clicking it again.</h2>");
        } else {
        window.location.replace("./index.php" + "?start_code=" + start_code);
        }
    }
    return cookieEnabled || showCookieFail();
}
function showCookieFail(){
  document.write("<h2>You need to allow cookies from this page to participate in this study.</h2> <h2>Please activate cookies and reload this page.</h2>");
}
checkCookies();
</script>


</body>
</html>
