<?php
require_once('../../login_check.php');

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

$subDomainErr = "";
$subDomain = $fieldEmpty = "";
$noError = true;

//check of alle vakken er zijn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["subDomain"])) {

		if (!preg_match('/[a-zA-Z0-9]/', $_POST['subDomain'])) {
			$fieldEmpty = "<span style='color: #ff0000;'></span>";
			$noError = false;
		}
		/* from */
		if (empty($_POST["subDomain"])) {
			echo $subDomainErr;
			$noError = false;
		} else {
			$subDomain = ($_POST["subDomain"]);
		}
	}

	if ($noError) {


		$query = "SELECT * FROM subDomain WHERE subDomain = '$subDomain' AND domainId = '" . $_POST['domain'] . "'";
		$result = $conn->query($query);

		if ($result->num_rows === 1) {
			$row = mysqli_fetch_array($result);

			if ($row['active'] == 0) {
				$sql = "UPDATE subDomain SET active = 1 WHERE subdomain = '$subDomain'";
			} else {
				echo "Subdomain already exist";
				$sql = "";
			}

		} else {
			$sql = "INSERT INTO subDomain(`subDomain`, domainId)
                VALUES ('$subDomain', '" . $_POST['domain'] . "')";
		}


		if ($conn->query($sql)) {
			header('location: sub_domain.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

}


/* laten zien */
$subDomainSql = "SELECT subDomain.id, CONCAT(subDomain,'.',`domain`) AS `subDomainName`
                   FROM subDomain
                   INNER JOIN `domain`
                   ON subDomain.domainId=`domain`.id
                   WHERE subDomain.active = 1";
$subDomainResult = $conn->query($subDomainSql) or die(mysqli_error($conn));

$domainSql = "SELECT id, `domain` FROM `domain`";
$domainResult = $conn->query($domainSql) or die(mysqli_error($conn));

/* bestaat het al in database */


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
					<a href='../../logout.php'><img src="../../images/logout.jpg" class="nav-img"><span class="hidden-xs menu-text">Uitloggen</span></a>
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
							<li class="active"><a href='#'>Subdomain</a></li>
						</ul>
					</div>
					<div id="tab-1" class="tab-content">
						<form method="post" class="form red-icon" action="" enctype="multipart/form-data">
							<h2 for="subDomain" style="
    margin-top: 0px;
    padding-top: 0px;
">Add subdomain</h2><?= $fieldEmpty; ?>
							<br>
							<?php if (strlen($fieldEmpty) > 0): ?>
								<input class="error" type="text"
									   id="subDomain"
									   name="subDomain"
									   placeholder="subdomain name"
							<?php else: ?>
								<input type="text"
									   id="subDomain"
									   name="subDomain"
									   placeholder="subdomain name"
									   class="inputSubdomain">
							<?php endif; ?>
							<select name="domain"
									class="selectSubdomain"
									id="domain">
								<option value="0" selected disabled>Please select a domain</option>
								<?php
								if ($domainResult->num_rows > 0):
									while ($row = $domainResult->fetch_array(MYSQLI_ASSOC)):?>
										<option value="<?= $row['id'] ?>">
											<?= $row['domain'] ?>
										</option>
										<?php
									endwhile;
								endif;
								?>
							</select> <br><br><input class="blue-button"
													 type="submit"
													 value="Create / Modify"
													 name="submit"/>
						</form>
						<h2>Current subdomains</h2>

						<p class="eleven">Lorem Ipsum on yksinkertaisesti testausteksti, jota tulostus- ja
										  ladontateollisuudet käyttävät. Lorem Ipsum on ollut teollisuuden normaali
										  testausteksti jo 1500-luvulta asti.</p>
						<input type='text' placeholder='Search' id='search-text-input'/>

						<div id='button-holder'>
							<img src='../../images/search.png'/>
						</div>
						<table class="auto">
							<tr>
								<th class="th">
									<p class="eleven-table">Subdomain</p>
								</th>
								<th class="thIcon">
									<p class="eleven-table">Action</p>
								</th>
							</tr>
							<?php while ($row = mysqli_fetch_array($subDomainResult)): ?>
								<tr>
									<td class="nine padding-elf"><?= $row["subDomainName"] ?></td>
									<td class="ed">
										<a href="edit_subdomain.php?id=<?= $row['id'] ?>" class="ed-padding">
											<img src="../../images/edit.png" class="edImg"></a>
										<a href="delete_subdomain.php?id=<?= $row['id'] ?>"
										   onclick="return confirm_delete();"> <img src="../../images/brullenbak.png"
																					class="edImg"></a>
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