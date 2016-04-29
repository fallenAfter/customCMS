<?php 
	// create table to display all users
	// database connection is used from page this is add into no need to run connection
	// set up sql query to fetch all users to be stored in a table
	$sql = "SELECT * FROM users WHERE power_level >= $userLevel";

	$result = $conn->query($sql);
	echo "<h3>Admin Table</h3>";
	echo "<table id='users'>";
	echo "<th>User ID</th><th>Username</th><th>Power Level</th><th>Delete</th>";

		// loop results into each row
		foreach($result as $row){
			echo '<tr><td>'.$row['user_id'].'</td>
			<td>'.$row['username'].'</td>
			<td>'.$row['power_level'].'</td>
			<td><a href="deleteUser.php?user_id=' . $row['user_id'] . '" 
			onclick="return confirm(\'Delete this User?\');">Delete</a></td>
			</tr>';
		}

	echo "</table>";
 ?>