<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main</title>
</head>
<body>
	<?php 
		// authentication check
		require_once('authentication.php');

		echo "welcome user your page is under construction";

		// connect to database
		require_once('db.php');
		// check to see user level. used for displaying administration options
		// save the session user id to a variable
		$user = $_SESSION['userId'];

		// set up sql query to return data for finding user power level
		$sql = "SELECT * FROM users WHERE user_id = $user";
		// query databse
		$result = $conn->query($sql);

		foreach($result as $row){
			// add a power level to the session
			$_SESSION['powerLevel'] = $row['power_level'];
		}
		// Assaign power level to a variable to be uses in conditional statments
		$userLevel = $_SESSION['powerLevel'];
		// compare curent user level to that of admin levels and display admin level data if they are
		if($userLevel <= 1){
			// load admin level pages if user is an admin
			require_once('admin.php');
			echo "we are admin";
		}

		$conn = null;
	?>
	<footer>
		<a href="logout.php">Logout</a>
	</footer>
</body>
</html>

<?php ob_flush() ?>