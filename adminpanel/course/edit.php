<?php
	include '../../pages/config.php';
	
	$id=$_GET['id'];
	
	$cName=$_POST['Course'];
	$descrip=$_POST['description'];
	
	mysqli_query($conn,"update courses set id='$id', course='$cName', description='$descrip' where id='$id'");
	header('location:course.php');
	exit(0);

?>