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


$characterErr = $intervalErr = $fromErr = $subjectErr = $bodyErr = $startDateTimeErr = $endDateTimeErr = "";
$character = $interval = $from = $subject = $body = $startDateTime = $endDateTime = "";

//check of alle vakken er zijn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (isset($_POST["character"], $_POST["interval"], $_POST["from"], $_POST["subject"], $_POST["body"], $_POST["startDateTime"], $_POST["endDateTime"])) {

		/* character */
		if (empty($_POST["character"])) {
			echo $characterErr;
		} else {
			$character = ($_POST["character"]);
		}

		/* interval */
		if (empty($_POST["interval"])) {
			echo $intervalErr;
		} else {
			$interval = ($_POST["interval"]);
		}

//        /* domein */
//        if (empty($_POST["domain"])) {
//            echo $domainErr;
//        } else {
//            $domain = ($_POST["domain"]);
//        }
//
//        /* mailAddress */
//        if (empty($_POST["mailAddress"])) {
//            echo $mailAddressErr;
//        } else {
//            $mailAddress = ($_POST["mailAddress"]);
//        }

		/* from */
		if (empty($_POST["from"])) {
			$fromErr = " filling in";
		} else {
			$from = ($_POST["from"]);
		}

		/* subject */
		if (empty($_POST["subject"])) {
			$subjectErr = " filling in";
		} else {
			$subject = $_POST["subject"];
		}

		/* body */
		if (empty($_POST["body"])) {
			$bodyErr = " filling in";
		} else {
			$body = $_POST["body"];
		}

		/* start */
		if (empty($_POST["startDateTime"])) {
			$startDateTimeErr = " filling in";
		} else {
			$startDateTime = $_POST["startDateTime"];
		}

		/* stop */
		if (empty($_POST["endDateTime"])) {
			$endDateTimeErr = " filling in";
		} else {
			$endDateTime = $_POST["endDateTime"];
		}
	}

	$sql = "INSERT INTO unavailable (`character`, `interval`, `from`, subject, body, startDateTime, endDateTime)
                VALUES ('$character', '$interval', '$from', '$subject', '$body', '$startDateTime', '$endDateTime')";

	if ($conn->query($sql)) {
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


$id = $_GET['id'];
$sql = 'SELECT domainId, mailboxId, `character`, `interval`, `from`, subject, body, startDateTime, endDateTime
        FROM unavailable
        INNER JOIN mailbox
        ON unavailable.mailboxId = mailbox.id
        WHERE unavailable.id = ' . $id;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


if ($row) {
	$domainId = $row["domainId"];
	$mailboxId = $row["mailboxId"];
	$character = $row["character"];
	$interval = $row["interval"];
//    $domein = $row["domein"];
//    $mailAddress = $row["mailAddress"];
	$from = $row["from"];
	$subject = $row["subject"];
	$body = $row["body"];
	$startDateTime = $row["startDateTime"];
	$endDateTime = $row["endDateTime"];
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
							<li><a href='autoresponders.php'>Autoresponders</a></li>
							<li><a href='autoresponder_add.php'>Add Responder</a></li>
							<li class="active"><a href="#">Edit Responder</a></li>
						</ul>
					</div>
					<div class="div">
						<form method="post" class="form" action="edit_update.php" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $id; ?>"/>
							<label for="character">Character</label> <select class="background-grey"
																			 id="character"
																			 name="character">
								<option value="0" selected disabled>Please select a character</option>
								<option value="utf-8">UTF-8</option>
							</select>

							<p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>
							<label for="interval">Interval</label> <select class="background-white"
																		   id="interval"
																		   name="interval">
								<option value="0" selected disabled>Please select a interval</option>
								<option value="hours">Hours</option>
							</select>

							<p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>
							<label for="domein">Domain</label> <select name="domein"
																	   id="domein"
																	   class="background-grey">
								<?php
								if ($domainResult->num_rows > 0):
									while ($row = $domainResult->fetch_array(MYSQLI_ASSOC)):?>
										<?php if ($row['id'] == $domainId): ?>
											<option value="<?php echo $row['id']; ?>"
													selected><?php echo $row['domain']; ?></option>
										<?php else: ?>
											<option value="<?php echo $row['id']; ?>"><?php echo $row['domain']; ?></option>
										<?php endif; ?>
										<?php
									endwhile;
								endif;
								?>
							</select> <label for="mailAddress">E-mail</label> <select name="mailAddress"
																					  id="mailAddress"
																					  class="background-grey">
								<?php
								if ($mailBoxResult->num_rows > 0):
									while ($row = $mailBoxResult->fetch_array(MYSQLI_ASSOC)):?>
										<?php if ($row['id'] == $mailboxId): ?>
											<option value="<?php echo $row['id']; ?>"
													selected><?php echo $row['mailAddress']; ?></option>
										<?php else: ?>
											<option value="<?php echo $row['id']; ?>"><?php echo $row['mailAddress']; ?></option>
										<?php endif; ?>
										<?php
									endwhile;
								endif;
								?>
							</select> <label for="from">From</label><?= $fromErr; ?>
							<input id="from"
								   type="text"
								   name="from"
								   placeholder="Abraham Lincoln"
								   class="input"
								   value="<?php echo $from; ?>"> <label for="subject">Subject</label><?= $subjectErr ?>
							<input type="text"
								   id="subject"
								   name="subject"
								   placeholder="The White House"
								   class="input"
								   value="<?php echo $subject; ?>">
					</div>
					<div class="div" style="position: absolute;">
						<label for="body">Body</label><?= $bodyErr ?>
						<input id="body"
							   name="body"
							   placeholder="Type hier u notitie"
							   class="inputBody"
							   value="<?php echo $body; ?>">
						<label for="startDateTime">Start</label><?= $startDateTimeErr ?><br> <input type="date"
																									id="startDateTime"
																									name="startDateTime"
																									placeholder="date"
																									class="input"
																									value="<?php echo $startDateTime; ?>">
						<br><br> <label for="endDateTime">Stop</label><?= $endDateTimeErr ?><br> <input type="date"
																										id="endDateTime"
																										name="endDateTime"
																										placeholder="Date"
																										class="input"
																										value="<?php echo $endDateTime; ?>">
						<br> <input class="blue-button" type="submit" value="Create / Modify" name="submit"/></form>
					</div>
				</div>
			</div>


		</div>

	</body>

</html>

