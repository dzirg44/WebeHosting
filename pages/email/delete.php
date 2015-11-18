<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebeHosting";

// connectie maken
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check connectie
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = $_GET['id'];
$sql = "UPDATE unavailable
        SET active = 0
        WHERE id = '$id'";

$sql1 = "INSERT INTO setOff
         WHERE active = 0;";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully <a href='autoresponders.php'>home</a>";
    header('location: autoresponders.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>