<?php
session_start();
unset ($_SESSION["login"]);
unset ($_SESSION["username"]);
session_destroy();
header ("location: login.php");
?>