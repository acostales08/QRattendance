<?php
include '../../pages/config.php';
	
	$class_id=$_POST['class_id'];
	$faculty_id=$_POST['faculty_id'];
	$subject_id=$_POST['subject_id'];
	
	mysqli_query($conn,"insert into class_subject (class_id, faculty_id, subject_id) values ('$class_id','$faculty_id', '$subject_id')");
	header('location:class_subject.php');

?>