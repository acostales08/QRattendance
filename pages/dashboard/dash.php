<?php
include '../config.php';
$class_subject = $_POST['class'];
header("location: dashboard.php?id=$class_subject");
exit(0);


  
?>