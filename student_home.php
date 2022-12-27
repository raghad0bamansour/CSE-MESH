<!DOCTYPE html>
<html>
<head>
<title>Student Homepage</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/homepage10.css">
</head>
<body>

<?php include "bar2.php"; ?>

<div class="row">
  <div class="col">
<a href="#main"><img class="Homepage" src="img/homepage2.png" alt=""></a></div></div>

<div class="row">
<div class="div1"><a name="main">
  <h2 class="head">Services</h2><br><br>
<div id="images">
  <div class="col">
    <figure>
        <a href="department_teacher.php"><img src="img/hour.png" class="img-thumbnail" style="width:55%" alt=""></a>
        <figcaption><strong>Book Office Hour</strong></figcaption>
    </figure>
  </div>
  <div class="col">
    <figure>
        <a href="workshops.php"><img src="img/workshop.png" class="img-thumbnail" style="width:55%" alt=""></a>
        <figcaption><strong>Workshop</strong></figcaption>
    </figure>
  </div>
  <div class="col">
    <figure>
        <a href="my_activity.php"><img src="img/active.png" class="img-thumbnail" style="width:55%" alt=""></a>
        <figcaption><strong>My Activity</strong></figcaption>
    </figure>
  </div>
</div>
</a>
</div>
</div>
</div>

<?php include "footer.php"; ?> 
</body>
</html>
