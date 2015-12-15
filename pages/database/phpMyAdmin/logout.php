<?php
session_start();

if (!isset($_SESSION["login"]))
{
	header('location: ../../../login.php');
}

session_name('SignonSession');
session_start();
session_destroy();
header('Location: ../../../indexx.php')
?>