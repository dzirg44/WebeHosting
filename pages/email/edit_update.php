<?php
require_once('../../login_check.php');

$character = $_POST['character'];
$interval = $_POST['interval'];
$from = $_POST['from'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$startDateTime = $_POST['startDateTime'];
$endDateTime = $_POST['endDateTime'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebeHosting";

// connectie maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check connectie
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


$id = $_POST['id'];
$sql = "UPDATE unavailable
        SET `character`='$character', `interval`='$interval', `from`='$from', subject='$subject', body='$body', startDateTime='$startDateTime', endDateTime='$endDateTime'
        WHERE id = $id";


if (mysqli_query($conn, $sql)) {
	header('location: autoresponders.php');
} else {
	echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>