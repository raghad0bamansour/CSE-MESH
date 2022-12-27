<?php
//action page

session_start();
include_once 'user.php';

$user = new User();

$id = $_GET['chosen'];

$insert = $user->registerWorkshop($id, $_SESSION['user_id']);

if($insert)
{
	echo "<script>alert('Registration done successfully');";
	echo "location='my_workshop.php';</script>";
}
else
{
	echo "<script>alert('You are already registered in this workshop!');";
	echo "location='workshops.php';</script>";
}
?>