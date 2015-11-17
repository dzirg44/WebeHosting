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


$id_email = $_GET['id'];
$sql = 'SELECT font, break, email, domein, belong, subject, body, start, stop FROM email WHERE id_email = ' . $id_email;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($row) {
    $font = $row["font"];
    $break = $row["break"];
    $email = $row["email"];
    $belong = $row["belong"];
    $subject = $row["subject"];
    $body = $row["body"];
    $start= $row["start"];
    $stop = $row["stop"];
}



?>


<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="css" href="../../css/layout.css">
</head>

<body>
        <form method="post" class="form" action="edit_update.php" enctype="multipart/form-data">
            <input type="hidden" name="id_email" value="<?php echo $id_email; ?>"/>

            <label for="font">Character</label>
                    <select class="background-grey" id="font" name="font">
                        <option value="utf-8">UTF-8</option>
                    </select>
                <p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>

                <label for="break">Interval</label>
                    <select class="background-white" id="break" name="break">
                        <option value="hours">Hours</option>
                    </select>
                <p class="nine">je fiktívny text, používaný pri návrhu tlačovín a typografie. Lorem </p>

                <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Email@example.com" value="<?php echo $email; ?>">

                <label for="domein">Domein</label>
                    <select name="domein" class="background-grey" id="domein">
                        <option value="Nildomain">Nildomain</option>
                    </select>

                <label for="belong">From</label>
                    <input id="belong" type="text" name="belong" placeholder="Abraham Lincoln" class="input" value="<?php echo $belong; ?>">

                <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="The White House" class="input" value="<?php echo $subject; ?>">

                <label for="body">Body</label>
                    <textarea id="body" type="text" name="body" placeholder="Type hier u notitie" value="<?php echo $body; ?>"></textarea>

                <label for="start">Start</label>
                <br>
                    <input id="start" type="radio" name="start" value="immidiatly"> Immidiatly
                <br>
                    <input type="radio" name="start" value="custom"> Custom
                <br><br>

                <label for="stop">Stop</label>
                <br>
                    <input id="stop" type="radio" name="stop" value="immidiatly" > Immidiatly
                <br>
                    <input type="radio" name="stop" value="custom"> Custom
                <br>

                <input class="blue-button" type="submit" value="Edit / Modify" name="submit" />
        </form>

</body>
</html>

