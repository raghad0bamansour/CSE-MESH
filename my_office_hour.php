<!DOCTYPE html>
<html>
<head>
<title>My Office Hour</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css" media="screen"/>
<link rel = "stylesheet" href= "css/stylesheet10.css">
</head>
<body>
<!--bar-->
<?php include "bar2.php"; ?>

<div class="div1">
  <h1>My Office Hour</h1>
    <p id="sub">Check the booked, canceled and confirmed office hour</p>
</div>

<div class="container-fluid pic1 py-3">
<div class="w3-card-4 w3-white">
<a id="tab1"><button class="button3" type="submit" >Booked OH</button></a>
<div id="t1">
 <?php 
         include 'user.php';
         $user  = new User();
         $datas = $user->showOH($_SESSION['user_id'], 'booked', 1);
        
         if ($datas == null)
         {
            echo "<br><br>No booked office hour";
         }
       else {
       foreach ($datas as $data)
       {   
           $id          = $data['id'];
           $teacher    = $data['t_name'];
           $type       = $data['type'];
           $day        = $data['day'];
           $slot       = $data['slot'];
           $detail     = $data['detail'];
           echo "<div class=\"w3-card-4\">";
           echo "<div class=\"w3-panel w3-light-gray\">";
           echo "<p><strong>Teacher:</strong> $teacher</p>";
           echo "<p><strong>Visit Type:</strong> $type</p>";
           echo "<p><strong>Day:</strong> $day</p>";
           echo "<p><strong>Slot:</strong> $slot</p>";
           echo "<p><strong>Detail:</strong> $detail</p>";
           echo "<form action=\"cancel.php\" method=\"post\">";
           echo "<button name=\"cancel\" class=\"w3-btn w3-amber\" value=\"$id\">";
           echo "Cancel</button></form><br><br></div></div>";   
        }   
       } 
  ?>
</div>

<br><a id="tab2"><button class="button3" type="submit" >Confirmed OH</button></a>
<div id="t2">
 <?php 

         $datas = $user->showOH($_SESSION['user_id'], 'confirmed', 1);
        
         if ($datas == null)
         {
            echo "<br><br>No booked office hour";
         }
       else {
       foreach ($datas as $data)
       {   
           $id         = $data['id'];
           $teacher    = $data['t_name'];
           $type       = $data['type'];
           $day        = $data['day'];
           $slot       = $data['slot'];
           $detail     = $data['detail'];
           echo "<div class=\"w3-card-4\">";
           echo "<div class=\"w3-panel w3-light-gray\">";
           echo "<p><strong>Teacher:</strong> $teacher</p>";
           echo "<p><strong>Visit Type:</strong> $type</p>";
           echo "<p><strong>Day:</strong> $day</p>";
           echo "<p><strong>Slot:</strong> $slot</p>";
           echo "<p><strong>Detail:</strong> $detail</p>";
           echo "<form action=\"cancel.php\" method=\"post\">";
           echo "<button name=\"cancel\" class=\"w3-btn w3-amber\" value=\"$id\">";
           echo "Cancel</button></form><br><br></div></div>";  
        }   
       } 
  ?>
</div>

<br><a id="tab3"><button class="button3" type="submit" >Canceled OH</button></a>
<div id="t3" class="pb-5">
  <?php
         $datas = $user->showOH($_SESSION['user_id'], 'canceled', 1);
        
       if ($datas == null)
       {
            echo "<br><br>No booked office hour";
       }
       else {
       foreach ($datas as $data)
       {   
          $id          = $data['id'];
           $teacher    = $data['t_name'];
           $type       = $data['type'];
           $day        = $data['day'];
           $slot       = $data['slot'];
           $detail     = $data['detail'];
           echo "<div class=\"w3-card-4\">";
           echo "<div class=\"w3-panel w3-light-gray\">";
           echo "<p><strong>Teacher:</strong> $teacher</p>";
           echo "<p><strong>Visit Type:</strong> $type</p>";
           echo "<p><strong>Day:</strong> $day</p>";
           echo "<p><strong>Slot:</strong> $slot</p>";
           echo "<p><strong>Detail:</strong> $detail</p><br></div></div>"; 
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