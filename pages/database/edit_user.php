<?php
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

$usernameErr = $passwordErr = $password1Err = "";
$username = $password = $password1 = $createAccount = "";
$passwordCheck = "";

//check of alle vakken er zijn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["username"], $_POST["password"], $_POST["password1"])) {

		/* user name */
		if (empty($_POST["username"])) {
			echo $usernameErr;
		} else {
			$username = ($_POST["username"]);
		}

		/* password */
		if (empty($_POST["password"])) {
			echo $passwordErr;
		} else {
			$password = $_POST["password"];
		}

		/* password1 */
		if (empty($_POST["password1"])) {
			echo $password1Err;
		} else {
			$password1 = $_POST["password1"];
		}
	}
}

$id = $_GET['id'];
$sql = "SELECT id, username, password
        FROM databaseUser
        WHERE id = " . $id;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


if ($row) {
	$username = $row["username"];
	$password = $row["password"];
}

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hosting panel</title>
		<link href="../../css/layout.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="../../js/script.js"></script>
		<script type="text/javascript"></script>
	</head>

	<body>
		<nav id='cssmenu' class="inner">
			<ul>
				<li>
					<img src="../../images/WeBeHosting.png" class="logo">
				</li>
				<li class='kop'>
					<a href='../../index.php'><img src="../../images/home.jpg"
												   class="nav-img"><span class="hidden-xs menu-text">Dashboard</span>
					</a>
				</li>
				<li class='kop'>
					<a href='../domain/domain.php'><img src="" class="nav-img"><span class="hidden-xs menu-text ">Domainen</span></a>
				</li>
				<li class='kop auto-email-kopdown'>
					<a href='#'><img src="../../images/mail.png"
									 class="nav-img"><span class="hidden-xs menu-text auto-email-kopdownn">E-mail</span></a>
					<ul class="auto-email-subdown">
						<li><a href='#' class="subkop">Mail Account</a></li>
						<li><a href='#' class="subkop">Forward Mail</a></li>
						<li><a href='../email/autoresponders.php' class="subkop">Autoresponders</a></li>
						<li><a href='#' class="subkop">Aliasses</a></li>
					</ul>
				</li>
				<li class='kop auto-databases-kopdown'>
					<a href='#'><img src="../../images/dedicated.png"
									 class="nav-img"><span class="hidden-xs menu-text auto-databases-kopdownn active">Databases</span></a>
				</li>
				<li class='kop'>
					<a href='#'><img src="../../images/cloud.jpg" class="nav-img"><span class="hidden-xs menu-text">Server</span></a>
				</li>
				<li class='kop'>
					<a href='#'><img src="../../images/account.png" class="nav-img"><span class="hidden-xs menu-text">Mijn account</span></a>
				</li>
				<li class='kop'>
					<a href='#'><img src="../../images/logout.jpg" class="nav-img"><span class="hidden-xs menu-text">Uitloggen</span></a>
				</li>
			</ul>
		</nav>
		<div id="nav" class="inner line-color">
		</div>
		<div class="content">
			<p class="red">
				<img src="../../images/kruis-red.png" class="red-icon"> CRITICAL EVENTS
			</p>

			<p class="green">
				<img src="../../images/green-vink.png" class="green-icon"> ACTIVE TICKET
			</p>

			<p class="orange">
				<img src="../../images/orange-server.png" class="orange-icon"> DEDICATED SERVER
			</p>

			<p class="blue">
				<img src="../../images/blue-cloud.png" class="blue-icon"> CLOUD SERVER
			</p>

			<div id="tabs-container">
				<div class="tab">
					<div id='tabmenu'>
						<ul>
							<li><a href='database.php'>Databases</a></li>
							<li><a href='database_add.php'>Add database</a></li>
							<li><a href="database_add_user.php">Add user</a></li>
							<li class="active"><a>Edit user</a></li>
						</ul>
					</div>
					<div class="div">
						<form method="post" class="form" action="edit_update_user.php" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $id; ?>"/>
							<label for="username">Username</label>
							<?= $usernameErr; ?>
							<input id="username" type="text" name="username" placeholder="username" class="input" value="<?= $username ?>">

							<label for="password">Password</label>
							<?= $passwordErr; ?>
							<br> <input type="password"
										id="password"
										name="password"
										placeholder="*********"
										class="input"> <br> <label for="password1">Password again</label>
							<?= $password1Err; ?>
							<br> <input type="password"
										id="password1"
										name="password1"
										placeholder="*********"
										class="input"><br><?= $passwordCheck ?>
					</div>
					<div class="div" style="position: absolute;">
						<input
							class="blue-button float-right"
							type="submit"
							value="Save"
							name="submit"/>                        </form>

					</div>
				</div>
			</div>

		</div>
		</div>

	</body>

</html>

