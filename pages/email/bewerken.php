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

$idemail = $_POST['id'];
$sql = 'SELECT characterr, intervall, email, domein, fromm, subject, body, start, stop FROM email WHERE idemail = ' . $idemail;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


if ($row) {
    $characterr = $row["characterr"];
    $intervall = $row["intervall"];
    $email = $row["email"];
    $domein = $row["domein"];
    $formm = $row["fromm"];
    $subject = $row["subject"];
    $body = $row["body"];
    $start = $row["start"];
    $stop = $row["stop"];
}


?>


<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="css" href="style.css">
</head>

<body>

<div id="tab-2" class="tab-content">
        <form method="post" class="form" action="edit.php" enctype="multipart/form-data">
            <div class="div">
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
                    <input type="email" id="email" name="email" placeholder="Email@example.com" class="input" value="<?php echo $email; ?>">
                <label for="domein">Domein</label><?php echo $domeinErr; ?>
                    <select name="domein" class="background-grey" id="domein">
                        <option value="Nildomain">Nildomain</option>
                    </select>
                <label for="fromm">From</label><?php echo $frommErr; ?>
                    <input id="fromm" type="text" name="fromm" placeholder="Abraham Lincoln" class="input" value="<?php echo $fromm; ?>">
                <label for="subject">Subject</label><?php echo $subjectErr; ?>
                    <input type="text" id="subject" name="subject" placeholder="The White House" class="input" value="<?php echo $subject; ?>">
            </div>
            <div class="div" style="position: absolute;">
                <label for="body">Body</label><?php echo $bodyErr; ?>
                    <textarea id="body" type="text" name="body" placeholder="Type hier u notitie" value="<?php echo $body; ?>"></textarea>
                <label for="start">Start</label><?php echo $startErr; ?>
                <br>
                    <input id="start" type="radio" name="start" value="immidiatly"> Immidiatly
                <br>
                    <input type="radio" name="start" value="custom"> Custom
                <br><br>
                <label for="stop">Stop</label><?php echo $stopErr; ?>
                <br>
                    <input id="stop" type="radio" name="stop" value="immidiatly"> Immidiatly
                <br>
                    <input type="radio" name="stop" value="custom"> Custom
                <br>
                <input class="blue-button" type="submit" value="Edit / Modify" name="submit" />
            </div>
        </form>
</div>

</body>
</html>

