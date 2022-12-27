<?php 
//action page

include "bar2.php";
// remove all session variables
session_unset();
// destroy the session
session_destroy();

header("location: login.html");