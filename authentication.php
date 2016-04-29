<?php
	// connect to session
	session_start();
	// check if session is already active if not send user to login page
	if(empty($_SESSION['userId'])){
		// redirect to login.php
		header('location:login.php');
		exit();
	}
?>