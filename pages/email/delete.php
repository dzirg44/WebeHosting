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

$sql = "DELETE FROM email WHERE idemail";


if (mysqli_query($conn, $sql)) {
    echo "Je gegevens zijn verwijderd <br /><br /><a href=''>Home >></a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>