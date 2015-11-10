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


$id_email = $_GET['id'];
$sql = "DELETE FROM email WHERE id_email = $id_email";


if (mysqli_query($conn, $sql)) {
    echo "Je gegevens zijn verwijderd <br /><br /><a href='autoresponders.php'>Home >></a>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>