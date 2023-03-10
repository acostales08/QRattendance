<?php
session_start();
include '../../pages/config.php';
	
	$cName=$_POST['Coursename'];
	$descrip=$_POST['description'];
	
	$query = mysqli_query($conn, "SELECT * FROM courses where course = '$cName' AND description  = '$descrip'");

	if (mysqli_num_rows($query) > 0) {
		$_SESSION['message'] = "Course is already exist";
		header('location:course.php');
		ob_end_flush();
			exit(0);
	}else{

			mysqli_query($conn,"insert into courses (course, description) values ('$cName', '$descrip')");
	header('location:course.php');
	ob_end_flush();
	exit(0);
	}


?>