<!DOCTYPE html>
<html>
<head>
<title>Manage Workshop</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css" media="screen"/>
<link rel = "stylesheet" href= "css/stylesheet10.css">
<style>

</style>
</head>
<body>
<!--bar-->
<?php include "bar2.php"; ?>

<div class="div1">
  <h1>Manage Workshop</h1>
    <p id="sub">Manage and add a new workshop</p>
</div>

<div class="container-fluid pic1 py-3">
<div class="w3-card-4 w3-white">
<button id="tab1" class="button3" type="submit" >My Workshop</button>
<div id="t1">
 <?php 
         include 'user.php';
         $user  = new User();
         $datas = $user->allWorkshop(2, $_SESSION['user_name']);
         $idArray = array();
         $titleArray = array();
         if ($datas == null)
           echo "<br><br>No workshop is added";

      else 
      {
       foreach ($datas as $data)
       { 
          echo "<div class=\"w3-card-2\">";  
          echo "<div class=\"w3-panel w3-light-gray\">";
           $id         = $data['id'];
           $title      = $data['title'];
           array_push($idArray, $id);
           array_push($titleArray, $title);
           $detail     = $data['detail'];
           $presenter  = $data['presenter'];
           $date       = $data['date'];
           $time       = $data['time'];
           $place      = $data['place'];
            echo "<h2>$title</h2>";
            echo "<p>$detail</p>";
            echo "<p><strong>Presenter:</strong> $presenter</p>";
            echo "<p><strong>Date:</strong> $date</p>";
            echo "<p><strong>Time:</strong> $time </p>";
            echo "<p><strong>Place:</strong> $place</p></div></div>";
        }   
       } 
  ?>
</div>

<br><button id="tab2" class="button3" type="submit" >Workshop Students Lists</button>
<div id="t2">
 
   <?php 
         //include 'user.php';
         //$user  = new User();
            for ($x = 0; $x < count($titleArray); $x++) {
             $presenter = $_SESSION['user_name'];
             $datas     = $user->manageWorkshop($presenter, $titleArray[$x]);
             echo "<button id=\"link1\" class=\"w3-btn w3-amber w3-xlarge\">$titleArray[$x]</button>";
             //if no student register
             if ($datas == null)
                echo "<br><br>No students<br>";

             else 
             { 
                 //to download the excel sheet  
                   echo "<form action=\"download.php\" method=\"post\">";
                   echo "<input type=\"hidden\" name=\"presenterName\" value=\"$presenter\">";
                   echo "<input type=\"hidden\" name=\"workshopTitle\" value=\"$titleArray[$x]\">";
                   echo "<button id=\"link1\" class=\"w3-btn w3-orange w3-medium w3-right\" name=\"export_data\"><i>Download Excel Sheet</i></button></form>"; 
                  //
                  echo "<br><div id=\"w1\">";
                  foreach ($datas as $data)
                  { 
                      echo "<div class=\"w3-card-2\">";  
                      echo "<div class=\"w3-panel w3-light-gray\">";
                      $name       = $data['std_name'];
                      $id         = $data['std_id'];
                      $major      = $data['std_major'];
                      $level      = $data['std_level']; 
                      echo "<p><strong>Student Name:</strong> $name</p>";
                      echo "<p><strong>Student ID:</strong> $id</p>";
                      echo "<p><strong>Major:</strong> $major</p>";
                      echo "<p><strong>Academic Level:</strong> $level</p>";
                      echo "<form action=\"remove.php\" method=\"post\">";
                      echo "<input type=\"hidden\" name=\"w_id\" value=\"$idArray[$x]\">";
                      echo "<button name=\"remove\" class=\"w3-btn w3-amber\" value=\"$id\">";
                      echo "Remove</button><br><br></form></div></div>";
                  } 
                  echo "</div>"; 
                  //foreach loop for id 
          } 
     }//end for big foreach
  ?>
</div>

<br><button id="tab3" class="button3" type="submit" >Add New Workshop</button>
<div id="t3" class="pb-5">
<form class="" action="workshop_add.php" method="post">
  <div class="w3-card-2">
  <div class="w3-panel w3-light-gray">
  <table class="table2">

    <tr>
      <td>Title:</td>
      <td><input type="text" name="title" required></td>
    </tr>
    <tr>
      <td>Detail:</td>
      <td><textarea name="detail" rows="3" cols="50" placeholder="Write detail about the workshop..." required></textarea></td>
    </tr>

    <tr>
      <td>Date:</td>
      <td><input type="date" name="dat" required></td>
    </tr>

    <tr>
      <td>Time:</td>
      <td><input type="time" name="tim" required ></td>
    </tr>

    <tr>
      <td>Place:</td>
      <td><input type="text"  name="place" required></td>
    </tr>

    <tr>
      <td class="pb-4"><input class="w3-btn w3-amber" type="submit" name="submit" value="Add"></td>
    </tr>

  </table>
  </div>
</div>
</form>
</div>
</div></div>

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
</script>
</body>
</html>
