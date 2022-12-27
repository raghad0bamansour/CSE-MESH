<!DOCTYPE html>
<html>
<head>
  <title>Department Teachers</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css" media="screen"/>
<link rel = "stylesheet" href= "css/stylesheet10.css">
</head>
<body>

<?php include "bar2.php"; ?>

<div class="div1">
  <h1>Department Teachers</h1>
    <p id="sub">Choose the teacher you want</p>
</div>
<center>
  <div class="container-fluid pic1">
  <form action="book_form.php" method="GET">
    <div class="row">
    <?php 
         include 'user.php';
         $user  = new User();
         $datas = $user->teachers();

    foreach ($datas as $data)
     {
         $name  = $data['t_name'];
         $email = $data['t_email'];
         echo "<div class='col-12 col-md-6'><button name='chosen' class='button1' type='submit' value='$name'>$name";
         echo "<br>$email</button></div>";
     }    
    ?>
  </div>
</form>
  </div>
</center>

<?php include "footer.php"; ?>

</body>
</html>