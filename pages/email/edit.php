<?php

$characterr = $_POST['characterr'];
$intervall = $_POST['intervall'];
$email = $_POST['email'];
$domein = $_POST['domein'];
$fromm = $_POST['fromm'];
$subject = $_POST['subject'];
$body = $_POST['body'];

$idemail = $_POST['idemail'];

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

$sql = "UPDATE email SET characterr='$characterr', intervall='$intervall', email='$email', domein='$domein', fromm='$fromm', subject='$subject', body='$body' WHERE idemail='$idemail'";


if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully <a href=''>home</a>";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>