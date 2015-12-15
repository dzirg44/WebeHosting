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
						<label for="username" class="white">Username:</label>
					</td>
					<td>
						<input type="text" name="username" id="username" class="login-text"/>
					</td>
				</tr>
				<tr>
					<td class="left">
						<label for="password" class="white">Password:</label>
					</td>
					<td>
						<input type="password" name="password" id="password" class="login-text"/>
					</td>
				</tr>
				<tr>
					<td class="left">
						<input type="checkbox" name="remember" value="password" checked>
						Remember me<br>
					</td>
					<td>
						<input type="submit" value="Login" name="" class="blue-button"/>
					</td>
				</tr>
			</table>
		</form>
		<a href="forgot_password.php" class="login-a">Forgot Password?</a><a href="register.php" class="login-a">Register</a>
	</body>
</html>