<?php //header("Cache-Control: no-cache, must-revalidate");
session_start();
/*
 This file will generate our CSV table. There is nothing to display on this page, it is simply used
 to generate our CSV file and then exit. That way we won't be re-directed after pressing the export
 to CSV button on the previous page.
*/

 // debugging tool
 function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ",", $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

// First we open our main csv file to see how many entries we have so far and to write to it later on.
$my_file = 'results.csv';
$wrong_answers = 'invalid_answers.csv';
$reloaders_file = 'reloads.csv';

// $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //open file for writing ('w","r","a')...
$data = file_get_contents($my_file);
$wrong_data = file_get_contents($wrong_answers);
$reloaders = file_get_contents($reloaders_file);
// fclose($handle);
// count the \n occurrences to know how many entries we have so far
$num_entries = substr_count($data, PHP_EOL);

$start_code = "";
$invalid_code = false;

$start_time = 0;
if (isset($_POST['start_time'])) {
	$start_time = $_POST['start_time'];
}

// server-side total time
$finish_time = time();
$time_taken = $finish_time - $start_time;

//client side time for pages 1 and 2
if (isset($_POST['time_replication_started']) and isset($_POST['time_comprehension_started']) and isset($_POST['time_previous_started'])) {
	$time1 = $_POST['time_replication_started'];
	$time2 = $_POST['time_comprehension_started'];
	$time3 = $_POST['time_previous_started'];
	$page1 = $time2 - $time1;
	$page2 = $time3 - $time2;
}

if (isset($_POST['start_code'])) {
	$start_code = $_POST['start_code'];
	if (strpos($data, "," . $start_code . ",") !== false) {
		$code = 'invalid code (start link has been already used to complete the study)';
		$invalid_code = true;
	} else if (hexdec($start_code) < 720000 or hexdec($start_code) > 721140){
		$code = 'invalid code (study was started with invalid url)';
		$invalid_code = true;
	} else if ($page1 < 8000 || $page2 < 8000){
		$code = 'invalid code (completion time was abnormally low indicating that you did not pay sufficient attention to the task)';
		$invalid_code = true;
	} else if ($time_taken > 15 * 60){
		$code = 'invalid code (completion time was abnormally long indicating that you did not complete the task without interruption as instructed)';
		$invalid_code = true;
	} else {
		$code = dechex(hexdec($start_code) * 7);//dechex(700027 + $num_entries * 151); // was: 42949 factor was 47
	} 
}
// check whether test question was correct

$test_question = "";
if (isset($_POST['test_question'])) {
	$test_question = $_POST['test_question'];
	$correct_trial = false;
	if ($test_question === 'common_cold') {
		$correct_trial = true;
	} else {
		$code = "";
	}
}

$attention_people = "";
if (isset($_POST['attention_people'])) {
	$attention_people = $_POST['attention_people'];
	if ($attention_people != 20) {
		$correct_trial = false;
		$code = '';
	}
}

// check whether IP address is known and in which context
$check_ip = $_SERVER['REMOTE_ADDR'];
$duplicate_correct = false;
$duplicate_wrong = false;
$reloader_cheat = false;

if (strpos($data, $check_ip) !== false) {
    // we already have an entry in our results with the same ip address --> give out the same code
    $ip_pos = strpos($data, $check_ip);
	$old_code = substr($data, 0, $ip_pos - 1); //$ip_pos-6, 5);
	$old_code = ltrim(strrchr($old_code, ","), ',');
	$duplicate_correct = true;
	if ($old_code == $code) {
		// somebody tried to do the test again using the same starting code.
	} else {
		// this one is weird. the starting code was different but we already have a valid entry from the same ip.
	}
	$code = $old_code;
}

if (strpos($wrong_data, $check_ip) !== false) {
    // we already have an entry in our wrong answer file with the same ip address --> give out an empty code
	$duplicate_wrong = true;
	$code = "";
}

if (strpos($reloaders, $check_ip) !== false) {
    // we already have an entry in our wrong answer file with the same ip address --> give out en empty code
	$reloader_cheat = true;
	$code = "";
}


//First we'll generate an output variable called out. It'll have all of our text for the CSV file.
$out = PHP_EOL;

// write a timestamp
$out .= date('Y-m-d_H-i-s',$finish_time) . ",";

// write the time to complete in seconds
$out .= $time_taken . ",";


// save the start code
$out .= $start_code . ",";

// save the code for the participant
$out .= $code . ",";



// save participants IP address
$out .= $check_ip . ",";

if (isset($_POST['condition'])) {
	$condition = $_POST['condition'];
	$out .= $condition . ",";
}

if (isset($_POST['how_effective_is_the_new_medication'])) {
	$effectiveness = $_POST['how_effective_is_the_new_medication'];
	$out .= $effectiveness . ",";
}


if (isset($_POST['comprehension'])) {
$comprehension = $_POST['comprehension'];
$out .= $comprehension . ",";
}


$did_study_before = false;
if (isset($_POST['participated_in_previous_study'])) {
	$previous_study = $_POST['participated_in_previous_study'];
	if ($previous_study === 'yes') {
		$did_study_before = true;
	}
	$out .= $previous_study . ",";
}

if (isset($_POST['age'])) {
$age = $_POST['age'];
$out .= $age . ",";
}

if (isset($_POST['gender'])) {
$gender = $_POST['gender'];
$out .= $gender . ",";
}

if (isset($_POST['education'])) {
$education = $_POST['education'];
$out .= $education . ",";
}

$out .= $test_question . ",";

$out .= $attention_people . ",";

$comments = "";
if (isset($_POST['comments'])) {
$comments = $_POST['comments'];
$out .= '"' . $comments . '"' . "," ;
}

// add whether this was a duplicate trial
$duplicate_info = "";
if($duplicate_correct) {
	$duplicate_info .= 'already answered correctly ';
} 
if ($duplicate_wrong) {
	$duplicate_info .= 'already answered wrong ';
}
if ($reloader_cheat) {
	$duplicate_info .= 'reloader';
}
$out .= $duplicate_info;


$out .= "," . $page1 . "," . $page2 . ",";

$belief_in_drug = "";
if (isset($_POST['belief_in_drug'])) {
$belief_in_drug = $_POST['belief_in_drug'];
$out .= $belief_in_drug . "," ;
}

$belief_in_science = "";
if (isset($_POST['belief_in_science'])) {
$belief_in_science = $_POST['belief_in_science'];
$out .= $belief_in_science;
}

if ($correct_trial and !$duplicate_wrong and !$duplicate_correct and !$reloader_cheat and !$invalid_code and !$did_study_before) {
file_put_contents ( $my_file , $out , FILE_APPEND | LOCK_EX );
} else {
	file_put_contents ( $wrong_answers , $out , FILE_APPEND | LOCK_EX );
}

//Now we're ready to create a file. This method generates a filename based on the current date & time.
// $filename = $filename_prefix."_".date("Y-m-d_H-i-s",time());

//Generate the CSV file header
// header("Content-type: application/vnd.ms-excel");
// header("Content-Encoding: UTF-8");
// header("Content-type: text/csv; charset=UTF-8");
// header("Content-disposition: csv" . date("Y-m-d_H-i-s") . ".csv");
// header("Content-disposition: filename=".$filename.".csv");
//echo "\xEF\xBB\xBF"; // UTF-8 BOM
//Print the contents of out to the generated file.
//print $out;

//$myfile = fopen("csv/".$filename.".csv", "w") or die("Unable to open file!");
// fwrite($handle, $out);
// $txt = "Jane Doe\n";
// fwrite($myfile, $txt);
// fclose($handle);

//Exit the script

$_SESSION['code']   = $code;
$_SESSION['correct_trial']   = $correct_trial;
$_SESSION['duplicate_correct']   = $duplicate_correct;
$_SESSION['duplicate_wrong']   = $duplicate_wrong;
$_SESSION['reloader']   = $reloader_cheat;
$_SESSION['start_code']   = $start_code;

header("Location: done.php");

exit;

?>


