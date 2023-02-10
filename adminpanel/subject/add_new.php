<?php
	include'../../pages/config.php';
	
	$sName=$_POST['subjectName'];
	$descrip=$_POST['description'];
	
	mysqli_query($conn,"insert into subjects (subject, description) values ('$sName', '$descrip')");
	header('location:subject.php');

?>