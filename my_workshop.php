<!DOCTYPE html>
<html>
<head>
<title>My Workshop</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css" media="screen"/>
<link rel = "stylesheet" href= "css/stylesheet10.css">
</head>
<body>
<!--bar-->
<?php include "bar2.php"; ?>

<div class="div1">
  <h1>My Workshop</h1>
    <p id="sub">Check what are the work workshops you registered in</p>
</div>

<div class="container-fluid pic1 py-3">
<div class="w3-card-4 w3-white">
<button id="tab1" class="button3" type="submit" >Registered</button>
<div id="t1">
 <?php 
         include 'user.php';
         $user  = new User();
         $datas = $user->myWorkshop($_SESSION['user_id'], 0);

         if ($datas == null)
           echo "<br><br>You did not registered in any workshop";

        else 
        {
          foreach ($datas as $data)
          {   
           $title      = $data['title'];
           $presenter  = $data['presenter'];
           $date       = $data['date'];
           $time       = $data['time'];
           $place      = $data['place'];
           echo "<div class=\"w3-card-4\">";
           echo "<div class=\"w3-panel w3-light-gray\">";
           echo "<h4>$title</h4>";
           echo "<p><strong>Presenter:</strong> $presenter</p>";
           echo "<p><strong>Date:</strong> $date</p>";
           echo "<p><strong>Time:</strong> $time </p>";
           echo "<p><strong>Place:</strong> $place</p></div></div>";   
          }
      }
    ?>
</div>

<br><a id="tab2"><button class="button3" type="submit" >Canceled</button></a>
<div id="t2" class="pb-5">
     <?php 
         $datas = $user->myWorkshop($_SESSION['user_id'], 1);

         if ($datas == null)
           echo "<br><br>No canceled workshop";

        else 
        {
          foreach ($datas as $data)
          {   
           $title      = $data['title'];
           $presenter  = $data['presenter'];
           $date       = $data['date'];
           $time       = $data['time'];
           $place      = $data['place'];
           echo "<div class=\"w3-card-4\">";
           echo "<div class=\"w3-panel w3-light-gray\">";
           echo "<h4>$title</h4>";
           echo "<p><strong>Presenter:</strong> $presenter</p>";
           echo "<p><strong>Date:</strong> $date</p>";
           echo "<p><strong>Time:</strong> $time </p>";
           echo "<p><strong>Place:</strong> $place</p></div></div>";   
          }
      }
    ?>
</div>

<br></div>
</div>

<!--For the footer-->
<?php include "footer.php"; ?>

<script>
$(document).ready(function(){
  $("#tab1").click(function(){
     $("#t1").toggle();
  });

  $("#tab2").click(function(){
     $("#t2").toggle();
  });

  $("#tab3").click(function(){
     $("#t3").toggle();

  $("#link1").click(function(){
    $("#w1").toggle();
  });
  });
});
</script>
</body>
</html>
