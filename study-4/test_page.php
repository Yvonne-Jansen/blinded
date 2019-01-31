<?php header("Cache-Control: no-cache, must-revalidate");
$start_code = $_GET["start_code"];
$code_valid = true;
$reloader = false;
$clicked_file = 'clicked.csv';
file_put_contents($clicked_file, PHP_EOL . $_SERVER['REMOTE_ADDR'], FILE_APPEND |LOCK_EX);
if (!$start_code) {
    $start_code = "empty";
    $code_valid = false;
} else if (hexdec($start_code) < 720000 or hexdec($start_code) > 721140){
        $start_code = 'empty';
        $code_valid = false;
} else {
    $my_file = 'results.csv';
    $data = file_get_contents($my_file);
    if (strpos($data, $start_code) !== false) {
        $start_code = 'empty';
        $code_valid = false;
    } else {
        $check_ip = $_SERVER['REMOTE_ADDR'];
        $reloaders_file = 'reloads.csv';
        $reloaders = file_get_contents($reloaders_file);
        if (strpos($reloaders, $check_ip) !== false) {
            $start_code = 'empty';
            $code_valid = false;
            $reloader = true;
        }
    }

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
 
<?php if ($reloader) {
    echo '<h2 id="reloader">Our data indicates that you previously started the experiment and reloaded the page. The instructions for this HIT stated explicitely to not reload the page. Any attempt to reload or to perform the HIT twice leads to exclusion from the study.</h2>';
}   else {
    echo '<noscript><h2>You need to activate JavaScript to participate in this study!</h2><h2>Please activate javascript and reload this page.</h2></noscript>

<h2 id="window_too_narrow">Your browser window is not wide enough. Please make the window wider until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<h2 id="window_too_short">Your browser window is not high enough. Please increase the height of this window  until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>

<h2 id="window_too_small">Your browser window is too small. Please increase both the height and width of this window  until this message disappears. If you are on a phone, you likely need to switch to a device with a larger display.</h2>
<div id="button_box" style="display:none"><div id="start_button"><strong>Click the start button below once you are ready.</strong><p>If your window is zoomed in, you might not be able to see or click the button below.</p>
</div><!---<button onclick="start()" id="start_button" style="display: none" disabled>Click here when you are ready to start</button>-->

<div id="continue" style="display:none">
<p>This page tests whether your screen size is suitable to let you complete this study.</p>
<p>Once you click the Start button, you need to finish the study on the device on which you clicked that button – otherwise our system cannot accept your response.
</p>
<button onclick=start() id="screenTestButton">Click here to start</button>
</div></div>
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
            document.getElementById("continue").style.display = "block";
            document.getElementById("button_box").style.display = "flex";
        }
    }
    return cookieEnabled || showCookieFail();
}

function checkWindowSize() {
    if (window.innerWidth < 700 || window.innerHeight < 700) {
        return false;
    } else {
        clearInterval();
        document.getElementById("continue").style.display = "block";
        document.getElementById("button_box").style.display = "flex";
    }
}
function showCookieFail(){
  document.write("<h2>You need to allow cookies from this page to participate in this study.</h2> <h2>Please activate cookies and reload this page.</h2>");
}

function start() {
    window.location.replace("./index.php" + "?start_code=" + start_code);

}
checkCookies();
</script>';
    }?>


</body>
</html>
