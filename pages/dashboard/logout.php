<?php 

session_start();
session_destroy();
session_unset();
header("Location: ../login/login2.php");
ob_end_clean();
?>