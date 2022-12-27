<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="#">CSE MESH.</a>
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
<?php
session_start(); 
//to direct the user to her page based on the rule
  if ($_SESSION['role']      == "student")
    $page = "student_home.php";
  else if ($_SESSION['role'] == "teacher")
    $page = "teacher_home.php";

     echo "<a class=\"nav-item nav-link active text-white\" href=\"$page\">Home <span class=\"sr-only\">(current)</span></a>
      <a class=\"nav-item nav-link text-white\" href=\"policy.php\">Policy</a>
      <a class=\"nav-item nav-link text-white\" href=\"about_us.php\">About Us</a>
      <a class=\"nav-item nav-link text-white\" href=\"help_center.php\">Help Center</a>
      <a class=\"nav-item nav-link text-white\" id=\"active\" href=\"account.php\"> Welcome, ".$_SESSION['user_name']." </a>
    </div>
  </div>
</nav>"
?>
</body>
</html>