<?php
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


$id = $_GET['id'];
$sql = "UPDATE `domain`
        SET active = '0'
        WHERE id = '$id'";


if (mysqli_query($conn, $sql)) {
	header('location: domain.php');
} else {
	echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
