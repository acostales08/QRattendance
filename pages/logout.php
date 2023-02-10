<?php 
include '../pages/config.php';
session_start();
$examineID = $_SESSION['sid'];
$is_active = 'no';

mysqli_query($conn, "UPDATE student_info SET is_active='$is_active' WHERE sid ='$examineID'");

session_destroy();

header("Location: ../pages/login/login.php");

?>