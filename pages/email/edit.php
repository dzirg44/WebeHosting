<?php

$font = $_POST['font'];
$break = $_POST['break'];
$email = $_POST['email'];
$domein = $_POST['domein'];
$belong = $_POST['belong'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$id_email = $_POST['id_email'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WebeHosting";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE email SET font='$font', break='$break', email='$email', domein='$domein', belong='$belong', subject='$subject', body='$body' WHERE idemail='$idemail'";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully <a href='autoresponders.php'>home</a>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>