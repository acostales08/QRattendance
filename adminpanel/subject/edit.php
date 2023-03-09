<?php
	include'../../pages/config.php';
	
	$id=$_GET['id'];
	
	$sName=$_POST['subjectName'];
	$descrip=$_POST['description'];
	
	mysqli_query($conn,"update subjects set id='$id', subject='$sName', description='$descrip' where id='$id'");
	header('location:subject.php');
	exit(0);

?>