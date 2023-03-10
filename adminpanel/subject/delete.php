<?php
	include'../../pages/config.php';
	$id=$_GET['id'];
	mysqli_query($conn,"delete from subjects where id='$id'");
	header('location:subject.php');
	ob_end_flush();
	exit(0);

?>