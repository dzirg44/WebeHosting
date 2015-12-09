<?php
session_name('SignonSession');
session_start();
session_destroy();
header('Location: ../../../index.php')
?>