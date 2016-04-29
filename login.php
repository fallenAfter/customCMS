<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>LogIn</title>
	</head>
	<body>
		<!-- Login form -->
		<section id="login">
			<h2>Login</h2>
			<form method="post" action="validate.php">
				<div>
					<label for="username">Username</label>
					<input name="username">
				</div>
				<div>
					<label for="password">Password</label>
					<input name="password" type="password">
				</div>
				<input type="submit", value="LogIn">
			</form>
		</section>

		<!-- registration form -->
		<section id="register">
			<h2>Register</h2>
			<form method="post" action="register.php">
				<div>
					<label for="uname">Username</label>
					<input name="uname">
				</div>
				<div>
					<label for="pwd">Password</label>
					<input name="pwd" type="password">
				</div>
				<input type="submit", value="Register">
			</form>
		</section>
	</body>
</html>