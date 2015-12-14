<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
		<link rel="stylesheet" type="css" href="css/layout.css">
	</head>
	<body style="text-align: center; background: #f6f6f6;">
		<img src="images/webehosting.png" style="width: 270px;">

		<form action="login_process.php" method="post">
			<table style="width: auto;
  margin: 10px auto; background: #fff;">
				<tr>
					<td>
						<label for="username" class="white">Username:</label>
					</td>
					<td>
						<input type="text" name="username" id="username" maxlength="40"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="password" class="white">Password:</label>
					</td>
					<td>
						<input type="password" name="password" id="password"/>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" name="remember" value="password" checked>
						Remember data<br>
					</td>
					<td>
						<input type="submit" value="OK" name=""/>
					</td>
				</tr>
			</table>
		</form>
		<a href="#" style="color: #000;">Forgot Password?</a><a href="#" style="color: #000;">Register</a>
	</body>
</html>