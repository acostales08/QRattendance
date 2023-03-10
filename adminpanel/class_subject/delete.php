<?php
include '../../pages/config.php';
	$id=$_GET['id'];
	mysqli_query($conn,"delete from class_subject where id='$id'");
	header('location:class_subject.php');
	ob_end_flush();
	exit(0);
?>