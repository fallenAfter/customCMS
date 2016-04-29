<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
	<?php 
		// harvest post values from login registration form
		$username = $_POST['uname'];
		$password = hash('sha512',$_POST['pwd']);


		// connect ot database
		require_once('db.php');

		// set up query to check if current username is unique
		$sql = "SELECT COUNT(*) FROM users WHERE username = :username";

		// prepare databse query to check to see how unique document is
		$cmd = $conn->prepare($sql);
		// bind username variable to check if input is unique
		$cmd->bindParam(':username', $username, PDO::PARAM_STR);
		// initiate query
		$result = $cmd->execute();

		echo $result;

		if($result = 0){
			echo "added";
			// sql query to add user to database, Defaul power_level is set to 2 changable in admin window, 2 is sub admin giving no power
			$sql = "INSERT INTO users (username, password, power_level) VALUES (:username, :password, 2)";
			// prepare sql line to fill placeholders
			$cmd = $conn->prepare($sql);
			// fill placeholders
			$cmd->bindParam(':username', $username, PDO::PARAM_STR);
			$cmd->bindParam(':password', $password, PDO::PARAM_STR);

			// initiate query
			$result = $cmd->execute();
		


		
		

			// ---------------log user in and bring to index-----------------
			// prepare sql query
			$sql = "SELECT * FROM users WHERE username = :username AND password = :password";
			
			$cmd = $conn->prepare($sql);
			// fill placeholders in sql sending username and password information
			$cmd->bindParam(':username', $username, PDO::PARAM_STR);
			$cmd->bindParam(':password', $password, PDO::PARAM_STR);

			// initiate the query
			$result = $cmd->execute();
			

			// Count number of users returned to determine if there was an account with the username and password
			$result = $cmd->rowCount();

			// check to see if there was any returned rows,
			// if there is any returned rows login was successful start session
			if($result > 0) {
				echo 'login successful';

				// access the section
				session_start();

				// create a loop to store the queried users in the session
				foreach($cmd as $row){
					// use users identity from users table to store in session
					$_SESSION['userId'] = $row['user_id'];

					// redcirect to index page
					header('location:index.php');
				}
			}
			
		}

		else{
			echo 'something went wrong. Attempt to log in or create another account</br><a href="login.php">try again</a>';
		}


		// disconect from database
		$conn = null;
	 ?>
</body>
</html>
<?php ob_flush(); ?>