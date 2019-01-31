<?php //header("Cache-Control: no-cache, must-revalidate");
session_start();
$code   = $_SESSION['code'];
$correct_trial = $_SESSION['correct_trial'];
$duplicate_correct = $_SESSION['duplicate_correct'];
$duplicate_wrong = $_SESSION['duplicate_wrong'];
$reloader_cheat = $_SESSION['reloader'];
$start_code = $_SESSION['start_code'];

$output_string = "";
if ($correct_trial) {
    $output_string = 'To receive payment, please copy the code shown below in the corresponding field on the Mechanical Turk website.</div><h2>' . $code . '</h2>';
} else {
    $output_string = 'Unfortunately you did not answer the final question correctly which indicates that you did not pay sufficient attention to this task. Payment is conditional on passing this question. You will therefore not receive payment.';
}
if ($duplicate_correct and $correct_trial) {
    $output_string .= '<p>However our data indicate that you already completed this study successfully. The code shown above is thus identical to the one you should have already received. Each code can only be used once to receive payment.';
} 

if ($reloader_cheat) {
    $output_string = "However our data indicate that you reloaded the page and circumvented our reload test. The instructions for this task stated explicitely to not reload the page. Any attempt to reload or to perform the task twice leads to exclusion from the study.";
} else if ($duplicate_wrong) {
    $output_string = "However our data indicate that you previously completed this task and that you then failed to answer the final question correctly. This task can only be completed once, and any attempt to reload or to perform the task twice leads to exclusion from the study.";
}  
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    
    
    
    <body>

<h2 style="margin-top: 20px">Finished</h2>

<div class="task-description">Thank you for participating in this study. 
<?php 
    echo $output_string;
    // echo 'Your start code was ' . $start_code;
    ?>
    </div>

</body>
</html>