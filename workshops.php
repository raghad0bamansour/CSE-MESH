<!DOCTYPE html>
<html>
<head>
<title>Workshop</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/loginstyle10.css">
<link rel = "stylesheet" href= "css/stylesheet10.css">
<style>

</style>
</head>
<body>
<?php include "bar2.php"; ?>

<div class="div1">
  <h1>Workshops</h1>
    <p id="sub">See the available workshops in the department</p>
</div>

<div class="container-fluid pic1">
<div class="w3-card-4">	
		<?php 
         include 'user.php';
         $user  = new User();
         $datas = $user->allWorkshop(1, null);

         if ($datas == null)
         	echo "<br><br>No workshop is announced";

         else 
         {
	     foreach ($datas as $data)
	     {   
	     	 echo "<div class=\"w3-panel w3-light-gray\">";
	     	 $id         = $data['id'];
	         $title      = $data['title'];
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
      	     echo "<p><strong>Place:</strong> $place</p>";
      	     if ($_SESSION['role'] == "student")
      	     {
                echo "<form action=\"workshop_register.php\" method=\"GET\">";
		        echo "<button name=\"chosen\" class=\"w3-btn w3-amber w3-text-white\" value=\"$id\">";
		        echo "Register</button><br><br></div><form>";
		     }  
		     else
		     echo "</div>"; 
	     } 
	     }   
        ?>
</div>
</div>


<?php include "footer.php"; ?>
</body>
</html>
