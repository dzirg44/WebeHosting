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

$firstNameErr = $lastNameErr = $emailErr = $usernameErr = $passwordErr = "";
$firstName = $lastName = $email = $username = $password = "";

//check of alle vakken er zijn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["username"], $_POST["password"])) {

		/* firstname */
		if (empty($_POST["firstName"])) {
			echo $firstNameErr;
		} else {
			$firstName = ($_POST["firstName"]);
		}

		/* lastname */
		if (empty($_POST["lastName"])) {
			echo $lastNameErr;
		} else {
			$lastName = ($_POST["lastName"]);
		}

		/* email */
		if (empty($_POST["email"])) {
			echo $emailErr;
		} else {
			$email = $_POST["email"];
		}

		/* username */
		if (empty($_POST["username"])) {
			echo $usernameErr;
		} else {
			$username = $_POST["username"];
		}

		/* password */
		if (empty($_POST["password"])) {
			echo $passwordErr;
		} else {
			$password = $_POST["password"];
		}
	}

	$sql = "INSERT INTO userRegistration(firstName, lastName, email, username, password)
                VALUES ('$firstName', '$lastName', '$email', '$username', '$password')";

	$sqlOne = "INSERT INTO admin(username, password)
                VALUES ('$username', '$password')";

	if ($conn->query($sql)) {
		if ($conn->query($sqlOne)) {
			header('location: login.php');
		} else {
			echo "Error: " . $sqlOne . "<br>" . mysqli_error($conn);
		}
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
		<link rel="stylesheet" type="css" href="css/layout.css">
	</head>
	<body class="login">
		<img src="images/webehosting.png" class="login-img">
		<form action="" method="post">
			<table class="login-table">
				<tr>
					<td class="left">
						<label for="firstName">Firstname:</label>
					</td>
					<td>
						<input type="text" name="firstName" id="firstName" class="login-text"/>
						<?= $firstNameErr ?>
					</td>
				</tr>
				<tr>
					<td class="left">
						<label for="lastName">Lastname:</label>
					</td>
					<td>
						<input type="text" name="lastName" id="lastName" class="login-text"/>
						<?= $lastNameErr ?>
					</td>
				</tr>
				<tr>
					<td class="left">
						<label for="email">E-mail:</label>
					</td>
					<td>
						<input type="email" name="email" id="email" class="login-text">
						<?= $emailErr ?>
					</td>
				</tr>
				<tr>
					<td class="left">
						<label for="username" class="white">Username:</label>
					</td>
					<td>
						<input type="text" name="username" id="username" class="login-text"/>
						<?= $usernameErr ?>
					</td>
				</tr>
				<tr>
					<td class="left">
						<label for="password" class="white">Password:</label>
					</td>
					<td>
						<input type="password" name="password" id="password" class="login-text"/>
						<?= $passwordErr ?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="Submit" name="" class="blue-button"/>
					</td>
				</tr>
			</table>
		</form>
		<a href="forgot_password.php" class="login-a">Forgot Password?</a><a href="login.php" class="login-a">Login</a>
	</body>
</html>
