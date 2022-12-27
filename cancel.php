<?php 
//action page
session_start();

include_once 'user.php';

$user = new User();
$id = $_POST['cancel'];
//echo $id;

$std      = $user->getStudentEmail($id);  //to get student email address to send email
$insert   = $user->alterBook($_SESSION['user_id'], $id, 'canceled');
$reserved = $user->reserved($id, 0);
$t        = $user->getTeacherEmail($id); //to get teacher email address to send email
$oh       = $user->getOh($id);           //to get oh details to print in email

if($insert)
{
	echo "<script>alert('Booking is canceled');";
	echo "location='my_office_hour.php';</script>";
}

else
{
    echo "<script>alert('Cannot cancel booking!');";
	echo "location='my_office_hour.php';</script>";
}

if ($t == null)
    echo "<br><br>Something went wrong";

else 
{
	foreach ($t as $ts)  
   	$t_email = $ts['t_email'];
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
$_SESSION['subject']     = 'CSE MESH - Booking Cancelation';
if ($_SESSION['role'] == 'student')
{
	$_SESSION['email']   = 'csemesh@gmail.com';   //we should put $t_email
	$_SESSION['message'] = '<b>This booking is cancaled by the student</b><br><br><i>Booking Details:</i><br>Student Name: ' .$_SESSION['user_name'] .'<br>Day: ' .$day. '<br>Time: ' .$time;
}

else if ($_SESSION['role'] == 'teacher')
{
	$_SESSION['email']   = 'csemesh@gmail.com';   //we should put $std_email
	$_SESSION['message'] = '<b>This booking is cancaled by the teacher</b><br><br><i>Booking Details:</i><br>Teacher Name: ' .$_SESSION['user_name'] .'<br>Day: ' .$day. '<br>Time: ' .$time;
}


include "send_email.php";
unset($_SESSION['subject']);
unset($_SESSION['message']);


?>