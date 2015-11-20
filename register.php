<?php
	session_start();
	require_once("database_config.php");
	
	@$username = $_POST['username'];
	@$password = $_POST['password'];
	@$email = $_POST['email'];
	
	$password_hash = password_hash($password, PASSWORD_DEFAULT);	// sent to db 
	
	if ( isset( $_POST['submitbutton'] ) ) {
		
		$duplication_result = $mysqli->query("SELECT username FROM customers WHERE username='$username'");
		
		if (!($stmt = $mysqli->prepare("INSERT INTO customers(username, password, email, date_registered) VALUES (?, ?, ?, NOW())"))) {
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}

		if (!$stmt->bind_param("sss", $username, $password_hash, $email)) {
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}

		// TODO: email confirmation (requires mail server)
		
		// if the # of rows returned from the query is greater than 0 (duplication), or execute() failed, print error
		if ($duplication_result->num_rows > 0 || !$stmt->execute()) {
			// echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			echo "<p style='color:#ff0000; position:fixed; top:30%; text-align:center; width:100%;'>Error! An account with that name already exists!</p>";
		} else {
			echo "<p style='color:#2980b9; position:fixed; top:30%; text-align:center; width:100%;'>Account created successfully.</p>";
		}
		$stmt->close();
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style_login.css">
		<title>Register</title>
	</head>
	<body>
		<center>
			<h1>CREATE AN ACCOUNT</h1>
			<form action="register.php" method="POST">
				<h2>USERNAME:</h2>
					<input type="text" name="username">
				<h2>PASSWORD:</h2>
					<input type="password" name="password">
				<h2>EMAIL:</h2>
					<input type="text" name="email">
				<br /><br />
				<input type="submit" value="Submit" name="submitbutton">
			</form>
		</center>
	</body>
</html>