<?php
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

$sql = 'DELETE FROM email WHERE id_email = ' . $id_email;

if (mysqli_query($conn, $sql)) {
    echo "Record delete successfully <a href='../../index.php'>home</a>";
} else {
    echo "Error delete record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>