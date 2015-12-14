<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebeHosting";

/* connectie maken */
$conn = mysqli_connect($servername, $username, $password, $dbname);
/* check connectie */
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


$domainErr = "";
$domain = "";

//check of alle vakken er zijn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["domain"])) {

		/* from */
		if (empty($_POST["domain"])) {
			echo $domainErr;
		} else {
			$domain = ($_POST["domain"]);
		}
	}

	$sql = "INSERT INTO domain(`domain`)
                VALUES ('$domain')";


	if ($conn->query($sql)) {
		header('location: domain.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


$id = $_GET['id'];
$sql = 'SELECT `domain`
        FROM `domain`
        WHERE id = ' . $id;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


if ($row) {
	$domain = $row["domain"];
}

$mailBoxSql = "SELECT id, mailAddress FROM mailbox";
$mailBoxResult = $conn->query($mailBoxSql) or die(mysqli_error($conn));

$domainSql = "SELECT id, `domain` FROM `domain`";
$domainResult = $conn->query($domainSql) or die(mysqli_error($conn));
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
					<a href='../../indexx.php'><img src="../../images/home.jpg"
												   class="nav-img"><span class="hidden-xs menu-text">Dashboard</span>
					</a>
				</li>
				<li class='kop'>
					<a href='#'><img src="" class="nav-img"><span class="hidden-xs menu-text active">Domainen</span></a>
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
					<a href='../database/database.php'><img src="../../images/dedicated.png"
															class="nav-img"><span class="hidden-xs menu-text auto-databases-kopdownn">Databases</span></a>
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
							<li><a href='domain.php'>Domain</a></li>
							<li><a href="sub_domain.php">Subdomain</a></li>
							<li class="active"><a href="#">Edit Domain</a></li>
						</ul>
					</div>
					<div class="div">
						<form method="post" class="form" action="edit_update.php" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?= $id; ?>"/>
							<label for="domain">Domain</label><?= $domainErr ?><br> <input type="text"
																						   id="domain"
																						   name="domain"
																						   placeholder="Domain name"
																						   class="input"
																						   value="<?= $domain; ?>">
							<br> <input class="blue-button" type="submit" value="Create / Modify" name="submit"/>
						</form>
					</div>
				</div>
			</div>


		</div>

	</body>

</html>

