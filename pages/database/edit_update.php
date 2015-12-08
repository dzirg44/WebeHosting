<?php
$databaseName = $_POST['databaseName'];
$username = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$username = "root";
$pw = "";
$dbname = "WebeHosting";

// connectie maken
$conn = mysqli_connect($servername, $username, $pw, $dbname);
// check connectie
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$id = $_POST['id'];
if (!empty($password)) {
	$sql = "UPDATE `database`
        SET databaseName='$databaseName', password='$password'
        WHERE id = '$id'";
} else {
	$sqlone = "UPDATE `database`
        SET databaseName='$databaseName'
        WHERE id = '$id'";
}

for($i=1; $i <= $_POST['username']; $i++) {
	$sqltwo = "INSERT INTO databaseUserLink
			   VALUES (" . $id . ", " . $_POST['username'] . ")";
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

//if (mysqli_query($conn, $sqltwo)) {
//	header('location: database.php');
//} else {
//	echo "Error updating record: " . mysqli_error($conn);
//}

mysqli_close($conn);
?>