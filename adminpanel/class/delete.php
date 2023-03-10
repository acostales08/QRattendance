<?php
include '../../pages/config.php';
	$id=$_GET['id'];
	mysqli_query($conn,"delete from class where id='$id'");
	header('location:class.php');
	ob_end_flush();
	exit(0);
?>