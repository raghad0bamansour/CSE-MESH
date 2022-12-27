<?php
//action page
	session_start();

	include_once 'user.php';

	$user = new User();

	if(isset($_POST['submit']))
	{
		$title      = $_POST['title'];
		$detail     = $_POST['detail'];
		$presenter  = $_SESSION['user_name'];
		$date       = $_POST['dat'];
		$time       = $_POST['tim'];
		$place      = $_POST['place'];
		$sql        = $user->addWorkshop($title, $detail, $presenter, $date, $time, $place);

		if($sql)
		{
			echo "<script>alert('Workshop is added');";
	        echo "location='manage_workshop.php';</script>";
		}
		else
		{
			echo "<script>alert('Workshop is not added');";
	        echo "location='manage_workshop.php';</script>";
		}
	
}
?>