<?php
require_once('../../login_check.php');

$username = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$userName = "root";
$pw = "";
$dbname = "WebeHosting";

// connectie maken
$conn = mysqli_connect($servername, $userName, $pw, $dbname);
// check connectie
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];
if (!empty($password)) {
	$sql = "UPDATE databaseUser
        	SET username='$username', password='$password'
        	WHERE id = '$id'";
} else {
	$sqlone = "UPDATE databaseUser
        	   SET username='$username'
        	   WHERE id = '$id'";
}

if (mysqli_query($conn, $sql)) {
	header('location: database.php');
} else {
	echo "Error updating record: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sqlone)) {
	header('location: database.php');
} else {
	echo "Error updating record: " . mysqli_error($conn);
}


mysqli_close($conn);
?>