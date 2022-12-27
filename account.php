<!DOCTYPE html>
<html>
<head>
  <title>Account</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css" media="screen"/>
<link rel = "stylesheet" href= "css/stylesheet10.css">
<link rel = "stylesheet" href= "css/account10.css">
<style>
</style>
</head>
<body>

<?php include "bar2.php"; ?>

<div class="div1">
  <h1>Account</h1>
    <p id="sub">Check your account and change your password</p>
</div>

<div class="container-fluid" style="background-color: #eae2b7">
<center><br><br>
<div class="table-responsive">
<table class="account">
  
<?php 
include 'user.php';
$user      = new User();
$user_data = $user->account($_SESSION['role'], $_SESSION['user_id']);
if ($_SESSION['role'] == "student")
{
echo "<tr><th>Name</th><td id='x'>"      .$user_data['std_name'].  "</td>"; 
echo "<th>Major</th><td id='x'>"         .$user_data['std_major']. "</td></tr>";
echo "<tr><th>ID</th><td id='x'>"        .$user_data['std_id'].    "</td>";
echo "<th>Acadmic Level</th><td id='x'>" .$user_data['std_level']. "</td></tr>";
echo "<th>Email</th><td id='x'>"         .$user_data['std_email']. "</td>";
}

if ($_SESSION['role'] == "teacher")
{
echo "<tr><th>Name</th><td id='x'>"      .$user_data['t_name'].  "</td>"; 
echo "<th>Department</th><td id='x'>"    .$user_data['t_dept']. "</td></tr>";
echo "<tr><th>ID</th><td id='x'>"        .$user_data['t_id'].    "</td>";
echo "<th>Lecturer</th><td id='x'>"      .$user_data['t_lec']. "</td></tr>";
echo "<th>Email</th><td id='x'>"         .$user_data['t_email']. "</td>";
}
?>

<th>Password</th><td><b>........</b></td>
</tr>
</table>
</div>
 <pre>
<form action="logout.php" method="post">
<button id="end" class="button" type="submit">Logout</button>
</form>
</pre>
</center><br><br>
</div>

<?php include "footer.php"; ?> 
</body>
</html>