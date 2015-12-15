<?php
session_start();

if (!isset($_SESSION["login"]))
{
	header('location: login.php');
}

session_start();
unset ($_SESSION["login"]);
unset ($_SESSION["username"]);
session_destroy();
header ("location: login.php");
?>