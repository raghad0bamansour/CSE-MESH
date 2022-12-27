<?php
// connecting to database
include 'user.php';
$user       = new User();
$conncetion = $user->connect();

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conncetion, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = $conncetion->query($check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry I can't understand you! Choose again from the list";
}

?>
