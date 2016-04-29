<?php ob_start(); ?>
<html>
<body>
	<?php 
		// store POST variables
		$username = $_POST['username'];
		$password = hash('sha512', $_POST['password']);
		// connect to databse
		require_once('db.php');

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
		else{
			echo 'invalid login. Please try again';
		}

		// disconect
		$conn = null;
	?>
</body>
</html>
<?php ob_flush(); ?>
