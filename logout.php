<?php 
//buffer start
ob_start(); 

//access the existing session so we can kill it
session_start();

//remove any session variables
session_unset();

//kill the session
session_destroy();

//redirect to login
header('location:login.php');

//buffer end
ob_flush();
?>