<?php 
include '../pages/config.php';
session_start();

session_destroy();

header("Location: ../pages/login/login.php");
session_regenerate_id(true);

?>