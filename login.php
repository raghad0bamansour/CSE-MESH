<?php
//action page

include 'user.php';
$user = new User();
session_start();
if (isset($_REQUEST['submit'])) 
{
	extract($_REQUEST);
	$login = $user->chk_login($id,$pass);
	if ($login != null) 
	{   
		$user_data = $login->fetch_assoc();

		// Registration Success 
		//echo "<script>alert('Welcome in CSE MESH');</script>";
		if ($_SESSION['role'] == "student")
		{
			$_SESSION['user_id']     = $user_data['std_id'];
			$_SESSION['user_name']   = $user_data['std_name'];
			//echo "Student ID: "      .$_SESSION['user_id'];
			//echo "Student NAME: "    .$_SESSION['user_name'];
			header("location:student_home.php");
		}

		else if ($_SESSION['role'] == "teacher")
		{
			$_SESSION['user_id']     = $user_data['t_id'];
			$_SESSION['user_name']   = $user_data['t_name'];
			//echo "Teacher ID: "      .$_SESSION['user_id'];
			header("location:teacher_home.php"); 
		}	
	} 
	
	else 
	{
		echo "<script>alert('Wrong ID or password!');";
	    echo "location='login.html';</script>";
	}    
}  
?>
