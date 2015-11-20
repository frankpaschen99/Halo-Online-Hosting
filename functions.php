<?php
require_once("database_config.php");

function isAdmin( $username, $mysqli ) {
	$row = userQuery("SELECT ACCESS_LVL FROM customers WHERE username = ?", $mysqli, $username);

	if ($row['ACCESS_LVL'] >= 2) return true;
	else return false;
}

function isAdminVerbose( $username, $mysqli) {
	if (isAdmin($username, $mysqli)) echo "$username has administrator priveleges. (ACCESS_LVL>=2).";
	else echo "$username does not have administrator priveleges.";
}

function fetchEmail( $username, $mysqli ) {
	$row = userQuery("SELECT email FROM customers WHERE username = ?", $mysqli, $username);
	
	return $row['email'];
}

function fetchRegisterDate( $username, $mysqli ) {
	$row = userQuery("SELECT date_registered FROM customers WHERE username = ?", $mysqli, $username);
	
	return $row['date_registered'];
}

function fetchUserID( $username, $mysqli ) {
	$row = userQuery("SELECT id FROM customers WHERE username = ?", $mysqli, $username);
	
	return $row['id'];
}

function userQuery( $query, $mysqli, $username ) {
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_assoc();
}
?>