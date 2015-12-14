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

/* laten zien */
$databaseSql = "SELECT id, databaseName
                FROM `database`
            	WHERE active = 1";
$databaseResult = $conn->query($databaseSql) or die(mysqli_error($conn));

$usernameSql = "SELECT id, username
                FROM databaseUser
            	WHERE active = 1";
$usernameResult = $conn->query($usernameSql) or die(mysqli_error($conn));


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
							<li class='active'><a href='#'>Databases</a></li>
							<li><a href='database_add.php'>Add database</a></li>
							<li><a href="database_add_user.php">Add user</a></li>
						</ul>
					</div>
					<div id="tab-1" class="tab-content">
						<h2>Current Databases</h2>

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
								<th class="thText">
									<p class="eleven-table">Databases</p>
								</th>
								<th class="thIcon">
									<p class="eleven-table ">Action</p>
								</th>
							</tr>
							<?php while ($row = mysqli_fetch_array($databaseResult)): ?>
								<tr>
									<td class="nine padding-elf"><?= $row["databaseName"] ?></td>
									<td class="ed">
										<a href="edit.php?id=<?= $row['id'] ?>" class="ed-padding">
											<img src="../../images/edit.png" class="edImg"></a>
										<a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm_delete();">
											<img src="../../images/brullenbak.png" class="edImg"></a>
									</td>
								</tr>
							<?php endwhile; ?>
						</table>

						<table class="auto">
							<tr>
								<th class="thText">
									<p class="eleven-table">Users</p>
								</th>
								<th class="thIcon">
									<p class="eleven-table ">Action</p>
								</th>
							</tr>
							<?php while ($row = mysqli_fetch_array($usernameResult)): ?>
								<tr>
									<td class="nine padding-elf"><?= $row["username"] ?></td>
									<td class="ed">
										<a href="phpMyAdmin/phpMyAdmin.php?id=<?= $row['id'] ?>" class="ed-padding">
											<img src="" class="edImg"></a>
										<a href="edit_user.php?id=<?= $row['id'] ?>" class="ed-padding">
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