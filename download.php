<?php
//action page to download the excel sheet
session_start();
include 'user.php';
$user       = new User();
$conncetion = $user->connect();

if(isset($_POST["export_data"])) {	
$presenter  = $_POST["presenterName"];
$title      = $_POST["workshopTitle"]; 

$sql_query = "SELECT std_name AS 'Student Name', std_id AS 'Student ID', std_email AS 'Email', std_major AS 'Major', std_level AS 'Level' FROM workshop NATURAL JOIN register_work NATURAL JOIN student WHERE workshop.presenter = '$presenter' AND workshop.title = '$title' AND removed=0 LIMIT 10";
$resultset = $conncetion->query($sql_query) or die("database error:". mysqli_error($conn));
$developer_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$developer_records[] = $rows;
}	

	$filename = $title. "_by_". $presenter. ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($developer_records)) {
	  foreach($developer_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}
?>