<?php 
ob_start();
$server = "localhost";
$user = "root";
$pass = "";
$database = "qrcodedb";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>