<?php
//action page 
        session_start();
         include 'user.php';
         $user  = new User();
         $datas = $user->showOH($_SESSION['user_id'], 'booked', 2);
        
       if ($datas == null)
       {
            echo "<br><br>No booked office hour";
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
           echo "<form action=\"confirm.php\" method=\"post\">";
           echo "<button name=\"confirm\" class=\"w3-btn w3-amber\" value=\"$w_id\">";
           echo "Confirm</button></form><br>";
           echo "<form action=\"cancel.php\" method=\"post\">";
           echo "<button name=\"cancel\" class=\"w3-btn w3-amber\" value=\"$w_id\">";
           echo "Cancel</button></form><br><br></div></div>";   
        }}
    ?>
