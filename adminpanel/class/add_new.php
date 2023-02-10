<?php
include '../../pages/config.php';
	
	$course=$_POST['course_id'];
	$level=$_POST['level'];
	$section=$_POST['section'];
	
	mysqli_query($conn,"insert into class (course_id, level, section) values ('$course','$level', '$section')");
	header('location:class.php');

?>