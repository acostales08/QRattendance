<?php
include '../../pages/config.php';
	
	$id=$_GET['id'];
	
	$class_id=$_POST['class_id'];
	$faculty_id=$_POST['faculty_id'];
	$subject_id=$_POST['subject_id'];
	
	mysqli_query($conn,"update class_subject set id='$id', class_id='$class_id', faculty_id='$faculty_id', subject_id='$subject_id' where id='$id'");
	header('location:class_subject.php');
	exit(0);

?>