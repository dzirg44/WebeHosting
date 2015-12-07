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
$unavailableSql = "SELECT unavailable.id, subject, startDateTime, endDateTime, mailAddress
                   FROM unavailable
                   INNER JOIN mailbox
                   ON unavailable.mailboxId=mailbox.id
                   WHERE unavailable.active = 1";
$unavailableResult = $conn->query($unavailableSql) or die(mysqli_error($conn));

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
									 class="nav-img"><span class="hidden-xs menu-text auto-email-kopdownn active">E-mail</span></a>
					<ul class="auto-email-subdown">
						<li><a href='#' class="subkop">Mail Account</a></li>
						<li><a href='#' class="subkop">Forward Mail</a></li>
						<li><a href='#' class="active subkop">Autoresponders</a></li>
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
							<li class='active'><a href='#'>Autoresponders</a></li>
							<li><a href='autoresponder_add.php'>Add Responder</a></li>
						</ul>
					</div>
					<div id="tab-1" class="tab-content">
						<h2>Current Autoresponders</h2>

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
									<p class="eleven-table">Begin</p>
								</th>
								<th class="thText">
									<p class="eleven-table">End</p>
								</th>
								<th class="thText">
									<p class="eleven-table">E-mail</p>
								</th>
								<th class="th">
									<p class="eleven-table">Subject</p>
								</th>
								<th class="thIcon">
									<p class="eleven-table">Action</p>
								</th>
							</tr>
							<?php while ($row = mysqli_fetch_array($unavailableResult)): ?>
								<tr>
									<td class="nine padding-elf"><?= $row["startDateTime"] ?></td>
									<td class="nine padding-elf"><?= $row["endDateTime"] ?></td>
									<td class="nine padding-elf"><?= $row["mailAddress"] ?></td>
									<td class="nine padding-elf"><?= $row["subject"] ?></td>
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