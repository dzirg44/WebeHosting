<?php
require_once('../../login_check.php');

$databaseName = $_POST['databaseName'];
$databaseUserId = $_POST['databaseUserId'];
$password = $_POST['password'];

$servername = "localhost";
$un = "root";
$pw = "";
$dbname = "WebeHosting";

// connectie maken
$conn = mysqli_connect($servername, $un, $pw, $dbname);
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

if (is_array($databaseUserId)) {
	$sqltwo = "INSERT INTO databaseUserLink
			   VALUES ";
	foreach ($databaseUserId as $u) {
		$sqltwo .= "(" . $id . ", " . $u . "),";
	}
	$sqltwo = substr($sqltwo, 0, strlen($sqltwo) - 1);
} else {
	$sqltwo = "INSERT INTO databaseUserLink
			   VALUES (" . $id . ", " . $databaseUserId . ")";
}

if (!empty ($databaseUserId)) {
	$databaseUser = "SELECT id, username
					  FROM `databaseUser`
					  WHERE id = '$databaseUserId'";
	$databaseUserResult = $conn->query($databaseUser) or die(mysqli_error($conn));
	$row = mysqli_fetch_array($databaseUserResult);

	$sqlCreate2 = "GRANT ALL PRIVILEGES on `" . $databaseName . "`.* TO '" . $row["username"] . "'@'" . $servername . "';";
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

if (mysqli_query($conn, $sqltwo)) {
	header('location: database.php');
} else {
	echo "Error updating record: " . mysqli_error($conn);
}

if (mysqli_query($conn, $sqlCreate2)) {
	header('location: database.php');
} else {
	echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>