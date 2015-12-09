<?php
// ...
$id = $_GET['id'];
$sql = "SELECT username, password FROM databaseUser WHERE id = '$id'";

$username = $_GET['username'];
$password = $_GET['password'];

// make the cookie reachable :
	session_set_cookie_params(0, '/', '', 0);
// same as in config.inc.php : 
	session_name('SignonSession');
	session_start();
	$_SESSION['PMA_single_signon_user'] = $username;
	$_SESSION['PMA_single_signon_password'] = $password;
	$_SESSION['PMA_single_signon_host'] = 'localhost'; // pma >= 2.11
// save changes :
	session_write_close();
// finally redirect to phpMyAdmin :
	header('Location: /phpmyadmin/index.php?server=1');

// ... the login form may follow here ...
?>