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

$subjectErr = $bodyErr = $startDateTimeErr = $endDateTimeErr = "";
$subject = $body = $startDateTime = $endDateTime = "";

//check of alle vakken er zijn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["subject"],$_POST["body"],$_POST["startDateTime"],$_POST["endDateTime"])) {

//        /* from */
//        if (empty($_POST["fromPerson"])) {
//            $fromPersonErr = " filling in";
//        } else {
//            $fromPerson = ($_POST["fromPerson"]);
//        }

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

        $sql = "INSERT INTO unavailable(subject, body, startDateTime, endDateTime)
                VALUES ('$subject', '$body', '$startDateTime', '$endDateTime')";

        $sql1 = "INSERT INTO mailBox(mailAddress)
                    VALUES ('$mailBoxSql')";

        if ($conn->query($sql . $sql1)) {
        } else {
            echo "Error: " . $sql . $sql1 . "<br>" . mysqli_error($conn);
        }
}

/* laten zien */
$mailBoxSql = "SELECT id, mailAddress FROM mailbox";
$mailBoxResult = $conn->query($mailBoxSql) or die(mysqli_error($conn));

$unavailableSql = "SELECT id, subject, startDateTime, endDateTime FROM unavailable";
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
            <a href='../../index.php'><img src="../../images/home.jpg" class="nav-img"><span class="hidden-xs menu-text">Dashboard</span>
            </a>
        </li>
        <li class='kop'>
            <a href='#'><img src="../../images/mail.png" class="nav-img"><span class="hidden-xs menu-text ">Domeinen</span></a>
        </li>
        <li class='kop auto-email-kopdown'>
            <a href='#'><img src="../../images/mail.png" class="nav-img"><span class="hidden-xs menu-text auto-email-kopdownn active">E-mail</span></a>
            <ul class="auto-email-subdown">
                <li><a href='#' class="subkop">Mail Account</a></li>
                <li><a href='#' class="subkop">Forward Mail</a></li>
                <li><a href='#' class="active subkop">Autoresponders</a></li>
                <li><a href='#' class="subkop">Aliasses</a></li>
            </ul>
        </li>
        <li class='kop auto-databases-kopdown'>
            <a href='#'><img src="../../images/dedicated.png" class="nav-img"><span class="hidden-xs menu-text auto-databases-kopdownn">Databases</span></a>
            <ul class="auto-databases-subdown">
                <li><a href='#' class="subkop">Subkop</a></li>
            </ul>
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
                    <li class='active'><a href='autoresponder_add.php'>Add Responder</a></li>
                </ul>
            </div>
            <div class="div">
                <form method="post" class="form" action="" enctype="multipart/form-data">
                    <label for="character">Character</label>
                    <select class="background-grey" id="character" name="charactr">
                        <option value="0" selected disabled>Please select a character</option>
                        <option value="utf-8">UTF-8</option>
                    </select>
                    <p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>
                    <label for="interval">Interval</label>
                    <select class="background-white" id="interval" name="interval">
                        <option value="0" selected disabled>Please select a interval</option>
                        <option value="hours">Hours</option>
                    </select>
                    <p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>
                    <label for="domein">Domein</label>
                    <select name="domein" class="background-grey" id="domein">
                        <option value="0" selected disabled>Please select a domain</option>
                        <option value="Nildomain">Nildomain</option>
                    </select>
                    <label for="mailAddress">E-mail</label>
                    <select name="mailAddress" class="background-grey" id="mailAddress">
                        <option value="0" selected disabled>Please select a email</option>

                        <?php
                        if($mailBoxResult->num_rows > 0):
                            while($row = $mailBoxResult->fetch_array(MYSQLI_ASSOC)):
                                ?>
                                <option value="<?=$row['id']?>"><?=$row['mailAddress']?></option>
                                <?php
                            endwhile;
                        endif;
                        ?>

                    </select>
                    <label for="fromPerson">From</label><?= $fromPersonErr; ?>
                    <input id="fromPerson" type="text" name="fromPerson" placeholder="Abraham Lincoln" class="input">
                    <label for="subject">Subject</label><?= $subjectErr ?>
                    <input type="text" id="subject" name="subject" placeholder="The White House" class="input">
            </div>
            <div class="div" style="position: absolute;">
                <label for="body">Body</label><?= $bodyErr ?>
                <textarea id="body" name="body" placeholder="Type hier u notitie"></textarea>
                <label for="start">Start</label><?= $startDateTimeErr ?><br>
                <input type="date" id="start" name="start" placeholder="Date" class="input">
                <br><br>
                <label for="stop">Stop</label><?= $endDateTimeErr ?><br>
                <input type="date" id="stop" name="stop" placeholder="Date" class="input">
                <br>
                <input class="blue-button" type="submit" value="Create / Modify" name="submit" />
                </form>
            </div>
        </div>
    </div>



</div>

</body>

</html>