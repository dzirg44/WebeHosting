<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebeHosting";

/* connectie maken */
$conn = new mysqli($servername, $username, $password, $dbname);
/* check connectie */
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

//Wat moet hier als we met sessies willen werken in deze pagina?
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

//check if username and password match
	$select = mysqli_query($conn, "SELECT username, password
								   FROM admin
								   WHERE username = '" . mysqli_real_escape_string($conn, $_POST["username"]) . "'
								   AND password = '" . mysqli_real_escape_string($conn, $_POST["password"]) . "';");

	if (mysqli_num_rows($select) == 1) {
//Combination
		$_SESSION["login"] = true;
		$_SESSION["username"] = $username;
		header("location: indexx.php");
	} else {
		header("location: login.php");

	}
}
?>
