<?php
session_start();
include '../../pages/config.php';
	
	$course=$_POST['course_id'];
	$level=$_POST['level'];
	$section=$_POST['section'];

	$query = mysqli_query($conn, "SELECT * FROM class where course_id = '$course' AND level  = '$level' AND section  = '$section'" );

	if (mysqli_num_rows($query) > 0) {
		$_SESSION['message'] = "Class is already exist";
		header('location:class.php');
			exit(0);

	}else{
	
	mysqli_query($conn,"insert into class (course_id, level, section) values ('$course','$level', '$section')");
	header('location:class.php');
	}

?>