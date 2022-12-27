<!DOCTYPE html>
<html>
<head>
  <title>My Activity</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css" media="screen"/>
<link rel = "stylesheet" href= "css/stylesheet10.css">
</head>
<body>

<?php include "bar2.php"; ?>

<div class="div1">
  <h1>My Activity</h1>
    <p id="sub">Do you want to review your booked office hour and your workshop?</p>
</div>

<center>
  <div class="container-fluid pic1">
    <div class="row">
    <div class="col-12 col-md-6">
   <a href="my_office_hour.php"><button class="button2" type="submit" >My Office Hour</button></a></div>
    <div class="col-12 col-md-6">
	<a href="my_workshop.php"><button class="button2" type="submit">My Workshop</button></a></div>
    </div>
  </div>
</center>

<?php include "footer.php"; ?>

</body>
</html>
