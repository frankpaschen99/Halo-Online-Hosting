<?php
// Configure the database here
$DB_USER = "halo_dev";
$DB_NAME = "halo_dev";
$DB_PASS = "siduck";
$DB_HOST = "localhost";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>