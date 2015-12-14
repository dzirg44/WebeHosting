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

$domainErr = "";
$domain = $fieldEmpty = "";
$noError = true;

//check of alle vakken er zijn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["domain"])) {

		if (!preg_match('/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/', $_POST["domain"])) {
			$fieldEmpty = "<span style='color: #ff0000;'>There have to be a .com or .be etc</span>";
			$noError = false;
		}

		/* domain */
		if (empty($_POST["domain"])) {
			echo $domainErr;
			$noError = false;
		} else {
			$domain = ($_POST["domain"]);
		}
	}

	if ($noError) {
		$sql = "INSERT INTO `domain`(`domain`)
                VALUES ('$domain')";


		if ($conn->query($sql)) {
			header('location: domain.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

}

/* laten zien */
$domainSql = "SELECT `domain`.id, `domain`
              FROM `domain`
              WHERE active = 1 ";
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
							<li class='active'><a href='#'>Domain</a></li>
							<li><a href='sub_domain.php'>Subdomain</a></li>
						</ul>
					</div>
					<div id="tab-1" class="tab-content">
						<form method="post" class="form red-icon" action="" enctype="multipart/form-data">
							<h2 for="domain" style="
    margin-top: 0px;
    padding-top: 0px;
">Add domain</h2><br>
							<?php if (strlen($fieldEmpty) > 0): ?>
								<input class="error" type="text"
									   id="domain"
									   name="domain"
									   placeholder="Domain name"
							<?php else: ?>
								<input type="text"
									   id="domain"
									   name="domain"
									   placeholder="Domain name"
									   class="inputDomain">
							<?php endif; ?>
							<?= $fieldEmpty; ?>
							<br><br><input class="blue-button" type="submit" value="Create / Modify" name="submit"/>
						</form>
						<h2>Current domains</h2>

						<p class="eleven">Lorem Ipsum on yksinkertaisesti testausteksti, jota tulostus- ja
										  ladontateollisuudet käyttävät. Lorem Ipsum on ollut teollisuuden normaali
										  testausteksti jo 1500-luvulta asti.</p>

						<form action="/search" method="get">
							<input type='text' placeholder='Search' id='search-text-input'/>

							<div id='button-holder'>
								<img src='../../images/search.png'/>
							</div>
						</form>
						<table class="auto">
							<tr>
								<th class="th">
									<p class="eleven-table">Domain</p>
								</th>
								<th class="thIcon">
									<p class="eleven-table">Action</p>
								</th>
							</tr>
							<?php while ($row = mysqli_fetch_array($domainResult)): ?>
								<tr>
									<td class="nine padding-elf"><?= $row["domain"] ?></td>
									<td class="ed">
										<a href="edit.php?id=<?= $row['id'] ?>" class="ed-padding">
											<img src="../../images/edit.png" class="edImg"></a>
										<a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm_delete();">
											<img src="../../images/brullenbak.png" class="edImg"></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</table>
					</div>

				</div>
			</div>

		</div>

		</div>

	</body>

</html>