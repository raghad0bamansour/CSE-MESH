<?php 
//action page
session_start();

include_once 'user.php';

$user = new User();
$std_id = $_POST['remove'];
$w_id = $_POST['w_id'];
//echo $id;

$insert = $user->alterWorkshop($std_id,$w_id, 1);

if($insert)
{
	echo "<script>alert('Student is removed');";
	echo "location='manage_workshop.php';</script>";
}

else
{
    echo "<script>alert('Cannot remove student!');";
	echo "location='manage_workshop.php';</script>";
}


?>