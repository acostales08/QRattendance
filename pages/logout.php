<?php 
include '../pages/config.php';
session_start();
$examineID = $_SESSION['sid'];
$is_active = 'no';
$view = 'no';

mysqli_query($conn, "UPDATE student_info SET is_active='$is_active', view='$view' WHERE sid ='$examineID'");

session_destroy();

header("Location: ../pages/login/login.php");

?>