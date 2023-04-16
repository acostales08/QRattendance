<?php 

session_start();
session_destroy();
session_unset();


header("Location: ../pages/login/login.php");
ob_end_flush();
exit(0);

?>