<?php
session_start();

require_once("database_config.php");

@$username = $_POST['username'];
@$password = $_POST['password'];

// Hey hackers, hack THIS!
// WOOOO PREPARED STATEMENTS!
$stmt = $mysqli->prepare("SELECT password FROM customers WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$result) {
    echo "Could not successfully run query from DB: " . $stmt->error;
	exit;
}

$hashed_password = $row['password'];

if (@hash_equals($hashed_password, crypt($password, $hashed_password))) {
	echo "<p style='color:#000; position:fixed; top:30%; text-align:center; width:100%;'>Password verified. Find a way to handle this.</p>";
	$_SESSION['logged-in'] = true;
	$_SESSION['user-name'] = $username;
	header('Location: index.php');
	die();
} else {
	if (!empty($username) && !empty($password)) {
		echo "<p style='color:#ff0000; position:fixed; top:30%; text-align:center; width:100%;'>Error! Incorrect password!</p>";
	}
}
$stmt->close();
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style_login.css">
		<title>Log In</title>
	</head>
	<body>
		<div id="login">
			<h1>SIGN IN TO HALO ONLINE HOSTING</h1>
			<form action="log_in.php" method="POST">
				<h2>USERNAME:</h2>
					<input type="text" name="username">
				<h2>PASSWORD:</h2>
					<input type="password" name="password">
				<br /><br />
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>