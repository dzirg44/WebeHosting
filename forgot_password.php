<?php

//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "WebeHosting";
//
///* connectie maken */
//$conn = new mysqli($servername, $username, $password, $dbname);
///* check connectie */
//if (!$conn) {
//	die("Connection failed: " . mysqli_connect_error());
//}
//
$emailErr = '';
//
//if ($_SERVER["REQUEST_METHOD"] === "POST") {
//	if (isset($_POST["email"])) {
//		if (empty($_POST['email'])) {
//			echo $emailErr;
//		} else {
//			$email = $_GET['email'];
//			$sql = "SELECT id, email, password, firstName, lastName
//					FROM userRegistration
//					WHERE email = " . $email;
//			$result = mysqli_query($conn, $sql);
//			$row = mysqli_fetch_array($result);
//
//			if ($row) {
//				$email = $row["email"];
//				$password = $row["password"];
//				$firstName = $row["firstName"];
//				$lastName = $row["lastName"];
//			}
//
//				$to = $email;
//				$subject = 'WebeHosting password';
//				$message = '<html><body>
//							<p>Dear '  . $firstName . ' ' . $lastName . ',</p><br><br>
//							<p>This is your password: ' . $password . '</p><br><br>
//							<p>Yours sincerely,</p><br><br>
//							<p>Team WebeHosting</p>
//							</body></html>';
//				$header = 'Content-type:text/html;charset=UTF-8' . '\r\n';
//
//				mail($to, $subject, $message, $header);
//		}
//	}
//}
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

		<form action="login_process.php" method="post">
			<table class="login-table">
				<tr>
					<td class="left">
						<label for="email" class="white">E-mail:</label>
					</td>
					<td>
						<input type="email" name="email" id="email" class="login-text"/>
						<?= $emailErr; ?>
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
		<a href="login.php" class="login-a">Login</a><a href="register.php" class="login-a">Register</a>
	</body>
</html>
