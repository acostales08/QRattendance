<?php
include '../config.php';
$class_subject = $_POST['class'];

header("location: attendance_report.php?id=$class_subject");
exit(0);


  
?>