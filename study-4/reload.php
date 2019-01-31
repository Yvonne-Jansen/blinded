
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Empty Project</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    
    
    
    <body>

<h1>You either reloaded the page or already completed this study, thus you can no longer participate in this study.</h1>
<h2>You can close this window now.</h2> 
</body>
</html>
<?php 
$my_file = 'reloads.csv';

// $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //open file for writing ('w","r","a')...
//$data = file_get_contents($my_file);
// fclose($handle);
// count the \n occurrences to know how many entries we have so far
//First we'll generate an output variable called out. It'll have all of our text for the CSV file.
$out = PHP_EOL;

// write a timestamp
$out .= date('Y-m-d_H-i-s',time()) . ",";


// save participants IP address
$out .= $_SERVER['REMOTE_ADDR'] . ",";




file_put_contents ( $my_file , $out , FILE_APPEND | LOCK_EX );


?>