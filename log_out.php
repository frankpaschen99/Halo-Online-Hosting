<?php
session_start();
$_SESSION['logged-in'] = false;
$_SESSION['user-name'] = null;
header('Location: index.php');
die("Log out successful.");
?>