<?php
	require_once("../functions.php");
	session_start();
	
	if (!$_SESSION["logged-in"]) echo "<h2 style='color:#ff0000'>Error: Not logged in</h2>";
	else {
		echo "<strong>User Information</strong><br />";
		isAdminVerbose($_SESSION['user-name'], $mysqli);
		echo "<br />" . fetchEmail($_SESSION['user-name'], $mysqli) . "<br />";
		echo fetchRegisterDate($_SESSION['user-name'], $mysqli) . "<br />";
		echo fetchUserID($_SESSION['user-name'], $mysqli) . "<br />";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Server Control Panel</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
		<noscript><h1>You must enable JavaScript in order to use the control panel. Thanks. :)<h1></noscript>
	</head>
		
	<body>
		
		<div id="wrapper">
			<!-- wrapper will center the website's structure. All code goes in here -->
			<div id="logo">
				<img draggable="false" src="../img/cp_banner.png" />
			</div>
			<h2 style="color:black;"><u>Server Actions</u></h2>
			<!-- Buttons here -->
		</div>
		
	</body>
</html>