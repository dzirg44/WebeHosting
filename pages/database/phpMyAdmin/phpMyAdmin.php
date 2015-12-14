<?php
$servername = "localhost";
$un = "root";
$pw = "";
$dbname = "WebeHosting";

/* connectie maken */
$conn = new mysqli($servername, $un, $pw, $dbname);
/* check connectie */
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

$sql = "SELECT username, password FROM databaseUser WHERE id = '$id'";
$sqlResult = $conn->query($sql) or die(mysqli_error($conn));
$row = mysqli_fetch_array($sqlResult);

// make the cookie reachable :
	session_set_cookie_params(0, '/', '', 0);
// same as in config.inc.php : 
	session_name('SignonSession');
	session_start();
	$_SESSION['PMA_single_signon_user'] = $row["username"];
	$_SESSION['PMA_single_signon_password'] = $row["password"];
	$_SESSION['PMA_single_signon_host'] = 'localhost'; // pma >= 2.11
// save changes :
	session_write_close();
// finally redirect to phpMyAdmin :
	header('Location: /phpmyadmin/index.php?server=1');

// ... the login form may follow here ...
?>