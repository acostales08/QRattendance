<?php
include '../../pages/config.php';
	
	$cName=$_POST['Coursename'];
	$descrip=$_POST['description'];
	
	mysqli_query($conn,"insert into courses (course, description) values ('$cName', '$descrip')");
	header('location:course.php');

?>