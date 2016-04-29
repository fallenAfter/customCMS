<?php
	try{
		// connect to database
		$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200224385', 'gc200224385', 'rx-5ym8M');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		$error = $e->getmessage();
		echo $error;
	}
?>