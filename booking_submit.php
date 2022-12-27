<?php
//action page
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include_once 'user.php';

	$user = new User();

	if(isset($_POST['submit']))
	{
		$id     = $_POST['selectedSlot'];
		$std_id = $_SESSION['user_id'];
		$type   = $_POST['visitType'];
		$detail = $_POST['detail'];
		$status = "booked";
		$res    = $user->reserved($id, 1);
		$sql    = $user->bookOH($id, $std_id, $type, $detail, $status);
		$data   = $user->getTeacherEmail($id); //to get teacher email address to send email
        $oh     = $user->getOh($id);    //to get oh details to print in email

		if($sql)
		{
			echo "<script>alert('Office hour is booked successfully');";
	        echo "location='my_office_hour.php';</script>";
		}
		else
		{
			echo "<script>alert('Office hour is not booked successfully!');";
	        echo "location='book_form.php';</script>";
		}

		if ($data == null)
            echo "<br><br>Something went wrong";

       else 
       {
       		foreach ($data as $datas)  
           	$t_email = $datas['t_email'];
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
        $_SESSION['email']   = 'csemesh@gmail.com';     //we should put $t_email
        $_SESSION['subject'] = 'CSE MESH - New Booking';
        $_SESSION['message'] = '<b>There is a new booking</b><br><br><i>Booking Details:</i> <br>Student Name: ' .$_SESSION['user_name'].'<br>Day: ' .$day. '<br>Time: ' .$time. '<br>For: ' .$type. '<br>Details: ' .$detail;
        include "send_email.php";
        unset($_SESSION['subject']);
        unset($_SESSION['message']);
  }
 ?>