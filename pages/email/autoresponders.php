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

$characterrErr = $intervallErr = $emailErr = $domeinErr = $frommErr = $subjectErr = $bodyErr = $startErr = $stopErr = "";

$characterr = $intervall = $email = $domein = $fromm = $subject = $body = $start = $stop = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    /* character */
    if (empty($_POST["characterr"])) {
        $characterrErr = " filling in";
    } else {
        $characterr = $_POST["characterr"];
    }

    /* interval */
    if (empty($_POST["intervall"])) {
        $intervallErr = " filling in";
    } else {
        $intervall = $_POST["intervall"];
    }

    /* email */
    if (empty($_POST["email"])) {
        $emailErr = " filling in";
    } else {
        $email = $_POST["email"];
    }

    /* domein */
    if (empty($_POST["domein"])) {
        $domeinErr = " filling in";
    } else {
        $domein = $_POST["domein"];
    }

    /* form */
    if (empty($_POST["fromm"])) {
        $frommErr = " filling in";
    } else {
        $fromm = $_POST["fromm"];
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
    if (empty($_POST["start"])) {
        $startErr = " filling in";
    } else {
        $start = $_POST["start"];
    }

    /* stop */
    if (empty($_POST["stop"])) {
        $stopErr = " filling in";
    } else {
        $stop = $_POST["stop"];
    }

    $sql = "INSERT INTO email (characterr, intervall, email, domein, fromm, subject, body, start, stop)
VALUES ('$characterr', '$intervall', '$email', '$domein', '$fromm', '$subject', '$body', '$start', '$stop')";


    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
$sql = mysqli_query($conn, 'SELECT * FROM email');
$result = $sql;
$row = mysqli_fetch_array($result);

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
</head>

<body>
    <div id='cssmenu' class="inner">
        <ul>
            <li>
                <img src="../../images/WeBeHosting.png" class="logo">
            </li>
            <li class='kop'>
                <a href='../../index.php'><img src="../../images/home.jpg" class="nav-img"><span class="hidden-xs menu-text">Dashboard</span>
                </a>
            </li>
            <li class='kop'>
                <a href='#'><img src="../../images/.jpg" class="nav-img"><span class="hidden-xs menu-text ">Domeinen</span></a>
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
    </div>
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
            <ul class="tabs-menu">
                <li class="current"><a href="#tab-1">Autoresponders</a></li>
                <li><a href="#tab-2">Add Responder</a></li>
            </ul>
            <div class="tab">
                <div id="tab-1" class="tab-content">
                    <h2>Current Autoresponders</h2>
                    <p class="eleven">Lorem Ipsum on yksinkertaisesti testausteksti, jota tulostus- ja ladontateollisuudet käyttävät. Lorem Ipsum on ollut teollisuuden normaali testausteksti jo 1500-luvulta asti.</p>
                    <input type='text' placeholder='Search' id='search-text-input' />
                    <div id='button-holder'>
                        <img src='../../images/search.png' />
                    </div>
                    <table class="auto">
                        <tr>
                            <th class="th">
                                <p class="eleven-table">E-mail</p>
                            </th>
                            <th class="th">
                                <p class="eleven-table">Subject</p>
                            </th>
                            <th class="th">
                                <p class="eleven-table">Action</p>
                            </th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_array($result)) {
                            echo '<tr>';
                            echo '<td class="nine padding-elf">' . $row["email"] . '</td>';
                            echo '<td class="nine padding-elf">' . $row["subject"] . '</td>';
                            echo '<td class="ed"><a href="bewerken.php?id=" class="ed-padding"><img src="../../images/edit.png"></a><a href="delete.php"><img src="../../images/brullenbak.png"></a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>

                <div id="tab-2" class="tab-content">
                    <div class="div">
                        <form method="post" class="form" action="" enctype="multipart/form-data">
                        <label for="characterr">Character</label><?php echo $characterrErr; ?>
                        <select class="background-grey" id="characterr" name="characterr">
                            <option value="utf-8">UTF-8</option>
                        </select>
                        <p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>
                        <label for="intervall">Interval</label><?php echo $intervallErr; ?>
                        <select class="background-white" id="intervall" name="intervall">
                            <option value="hours">Hours</option>
                        </select>
                        <p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>
                        <label for="email">E-mail</label><?php echo $emailErr; ?>
                        <input type="email" id="email" name="email" placeholder="Email@example.com" class="input">
                        <label for="domein">Domein</label><?php echo $domeinErr; ?>
                            <select name="domein" class="background-grey" id="domein">
                                <option value="Nildomain">Nildomain</option>
                            </select>
                        <label for="fromm">From</label><?php echo $frommErr; ?>
                        <input id="fromm" type="text" name="fromm" placeholder="Abraham Lincoln" class="input">
                        <label for="subject">Subject</label><?php echo $subjectErr; ?>
                        <input type="text" id="subject" name="subject" placeholder="The White House" class="input">
                    </div>
                    <div class="div" style="position: absolute;">
                        <label for="body">Body</label><?php echo $bodyErr; ?>
                        <textarea id="body" type="text" name="body" placeholder="Type hier u notitie"></textarea>
                        <label for="start">Start</label><?php echo $startErr; ?>
                        <br>
                            <input id="start" type="radio" name="start" value="immidiatly" checked> Immidiatly
                            <br>
                            <input type="radio" name="start" value="custom"> Custom
                        <br><br>
                        <label for="stop">Stop</label><?php echo $stopErr; ?>
                        <br>
                            <input id="stop" type="radio" name="stop" value="immidiatly" checked> Immidiatly
                            <br>
                            <input type="radio" name="stop" value="custom"> Custom
                            <br>
                            <input class="blue-button" type="submit" value="Create / Modify" name="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>

</body>

</html>