<?php
include '../config.php';
$class_subject = $_POST['class'];
header("location: scan_attendance.php?id=$class_subject");
exit(0);


  
?>