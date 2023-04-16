<?php
include '../config.php';
$class_subject = $_POST['class'];
header("location: admin.php?id=$class_subject");
ob_end_flush();
exit(0);


  
?>