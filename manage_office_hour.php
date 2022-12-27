<!DOCTYPE html>
<html>
<head>
<title>Manage Office Hour</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css" media="screen"/>
<link rel = "stylesheet" href= "css/stylesheet10.css">

</head>
<body>
<!--bar-->
<?php include "bar2.php"; ?>

<div class="div1">
  <h1>Manage Office Hour</h1>
    <p id="sub">Manage the booked office hour</p>
</div>

<div class="container-fluid pic1 py-3">
<div class="w3-card-4 w3-white">
<button id="booked" class="button3" type="submit" >Booked OH</button>
<div id="b">
  <!--Ajax  here-->
  <script>
$(document).ready(function(){
  $("#booked").click(function(){
    $("#b").load("booked_oh.php");
  });
});
</script>

</div>

<br><button id="confirmed" class="button3" type="submit" >Confirmed OH</button>
<div id="c">
  <?php 
         include 'user.php';
         $user  = new User();
         $datas = $user->showOH($_SESSION['user_id'], 'confirmed', 2);
        
       if ($datas == null)
       {
            echo "<br><br>No confirmed office hour";
       }
       else {
       foreach ($datas as $data)
       {  
           $name       = $data['std_name'];
           $id         = $data['std_id'];
           $major      = $data['std_major'];
           $level      = $data['std_level']; 

           $w_id       = $data['id'];
           $type       = $data['type'];
           $day        = $data['day'];
           $slot       = $data['slot'];
           $detail     = $data['detail'];
           echo "<div class=\"w3-card-4\">";
           echo "<div class=\"w3-panel w3-light-gray\">";
           echo "<h4>Student Information</h4>";
           echo "<p><strong>Student Name:</strong> $name</p>";
          echo "<p><strong>Student ID:</strong> $id</p>";
          echo "<p><strong>Major:</strong> $major</p>";
          echo "<p><strong>Academic Level:</strong> $level</p><br>";

          echo "<h4>Booking Information</h4>";
           echo "<p><strong>Visit Type:</strong> $type</p>";
           echo "<p><strong>Day:</strong> $day</p>";
           echo "<p><strong>Slot:</strong> $slot</p>";
           echo "<p><strong>Detail:</strong> $detail</p>";
           echo "<form action=\"cancel.php\" method=\"post\">";
           echo "<button name=\"cancel\" class=\"w3-btn w3-amber\" value=\"$w_id\">";
           echo "Cancel</button></form><br><br></div></div>";   
        }}
    ?>
</div>


<br><button id="canceled" class="button3 mt-4" type="submit" >Canceled OH</button>
<div id="n" class="pb-5">
  <?php 
         //include 'user.php';
         //$user1  = new User();
         $datas = $user->showOH($_SESSION['user_id'], 'canceled', 2);
        
       if ($datas == null)
       {
            echo "<br><br>No canceled office hour";
       }
       else {
       foreach ($datas as $data)
       {  
           $name       = $data['std_name'];
           $id         = $data['std_id'];
           $major      = $data['std_major'];
           $level      = $data['std_level']; 

           $w_id       = $data['id'];
           $type       = $data['type'];
           $day        = $data['day'];
           $slot       = $data['slot'];
           $detail     = $data['detail'];
           echo "<div class=\"w3-card-4\">";
           echo "<div class=\"w3-panel w3-light-gray\">";
           echo "<h4>Student Information</h4>";
           echo "<p><strong>Student Name:</strong> $name</p>";
          echo "<p><strong>Student ID:</strong> $id</p>";
          echo "<p><strong>Major:</strong> $major</p>";
          echo "<p><strong>Academic Level:</strong> $level</p><br>";

          echo "<h4>Booking Information</h4>";
          echo "<p><strong>Visit Type:</strong> $type</p>";
          echo "<p><strong>Day:</strong> $day</p>";
          echo "<p><strong>Slot:</strong> $slot</p>";
          echo "<p><strong>Detail:</strong> $detail</p></div></div>";  
        }}
    ?>
</div>
</div>
</div>

<!--For the footer-->
<?php include "footer.php"; ?>

<script>
$(document).ready(function(){
  $("#booked").click(function(){
     $("#b").toggle();
  });

  $("#confirmed").click(function(){
     $("#c").toggle();
  });

  $("#canceled").click(function(){
     $("#n").toggle();
  });
});

</script>
</body>
</html>
