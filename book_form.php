<!DOCTYPE html>
<html>
<head>
<title>Book Office Hour</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel = "stylesheet" href= "css/stylesheet10.css">
<link rel="stylesheet" href="css/bookform10.css">
</head>
<body>

<?php include "bar2.php"; ?>

<div  class="bord">
  <div class="container-fluid">
  <form id="form1" action="booking_submit.php" method="post">
    <table align="center">
      <tr>
        <td>Teacher: </td>

        <td><p><?php echo $_GET['chosen']; ?></p></td>
      </tr>
      <tr>
        <td>Visit Type: </td>
        <td>
          <select   class="visittype" name="visitType" required>
            <option value=""disabled selected>Choose</option>
            <option value="Assignment">Assignment</option>
            <option value="Quiz">Quiz</option>
            <option value="Project">Project</option>
            <option value="Midterm">Midterm</option>
            <option value="Inquiry">Inquiry</option>
            <option value="Other">Other</option>
         </select>
      </td>
      </tr>

      <tr>
        <td>Slot: </td>
        <td>
          <select class="slot" name="selectedSlot" required>
            <option value="" disabled selected>Choose</option>
          <?php 
                include 'user.php';
                $user  = new User();
                $datas = $user->oh($_GET['chosen']);

                foreach ($datas as $data)
                {
                   $id    = $data['id'];
                   $day   = $data['day'];
                   $slot  = $data['slot'];
                   echo "<option value=\"$id\">$day - $slot</option>";
                }  
                  
            ?>
      </select>  
      </td>
      </tr>

      <tr>
        <td>Detail: </td>
        <td><textarea name="detail" rows="2" cols="30" placeholder="Write more detail..."></textarea></td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" value="Book"></td>
      </tr>
  </table>
  </form>
</div>
</div>

<br><br><br><br><br><br>
<?php include "footer.php"; ?>

</body>
</html>