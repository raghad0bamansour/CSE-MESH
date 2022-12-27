<?php 
//action page
session_start();

include_once 'user.php';

$user = new User();
$id = $_POST['confirm'];
//echo $id;

$std    = $user->getStudentEmail($id);  //to get student email address to send email
$insert = $user->alterBook($_SESSION['user_id'], $id, 'confirmed');
$oh       = $user->getOh($id);           //to get oh details to print in email

if($insert)
{
	echo "<script>alert('Booking is confirmed');";
	echo "location='manage_office_hour.php';</script>";
}

else
{
    echo "<script>alert('Cannot confirm booking!');";
	echo "location='manage_office_hour.php';</script>";
}

if ($std == null)
    echo "<br><br>Something went wrong";

else 
{
	foreach ($std as $s)  
   	$std_email = $s['std_email'];
}


if ($oh == null)
    echo "<br><br>Something went wrong";

else 
{
    foreach ($oh as $hour)
    {
        $day  = $hour['day'];
        $time = $hour['slot'];
    }
}

//for email notification 
$_SESSION['email']   = 'csemesh@gmail.com';  //we should put $std_email
$_SESSION['subject'] = 'CSE MESH - Booking Confirmation';
$_SESSION['message'] = '<b>This booking is confirmed by the teacher</b><br><br><i>Booking Details:</i><br>Teacher Name: ' .$_SESSION['user_name'] .'<br>Day: ' .$day. '<br>Time: ' .$time;

include "send_email.php";
unset($_SESSION['subject']);
unset($_SESSION['message']);

?>