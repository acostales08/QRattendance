<?php
session_start();
include '../../pages/config.php';
	
	$class_id=$_POST['class_id'];
	$faculty_id=$_POST['faculty_id'];
	$subject_id=$_POST['subject_id'];
	
	$query = mysqli_query($conn, "SELECT * FROM class_subject where class_id = '$class_id' AND faculty_id  = '$faculty_id' AND subject_id  = '$subject_id'" );

	if (mysqli_num_rows($query) > 0) {
		$_SESSION['message'] = "Class is already exist";
		header('location:class_subject.php');
			exit(0);

	}else{
	mysqli_query($conn,"insert into class_subject (class_id, faculty_id, subject_id) values ('$class_id','$faculty_id', '$subject_id')");
	header('location:class_subject.php');
	exit(0);
	}
?>