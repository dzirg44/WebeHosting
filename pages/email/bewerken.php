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

$id_email = $_GET['id'];
$sql = 'SELECT characterr, intervall, email, domein, fromm, subject, body, start, stop FROM email WHERE id_email = ' . $id_email;

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

    </head>

    <body>
        <form action="edit.php" method="post">
            <div>
                <p><strong>ID:</strong>
                    <?php echo $id_email; ?>
                </p>
                <tabel>
                    <tr>
                        <td>Character</td>
                        <td>
                            <select name="characterr">
                                <option value="utf-8">utf-8</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Interval</td>
                        <td>
                            <select name="intervall">
                                <option value="hours">hours</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">email</label>
                        </td>
                        <td>
                            <input type="text" name="email" id="email" value="<?php echo $email; ?>"><span class="error">* <?php echo $emailErr;?></span>

                        </td>
                    </tr>
                </tabel>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </body>

    </html>