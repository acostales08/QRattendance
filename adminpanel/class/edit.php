<?php
include '../../pages/config.php';
	
	$id=$_GET['id'];
	
	$course = $_POST['course_id'];
	$level=$_POST['level'];
	$section=$_POST['section'];
	
	mysqli_query($conn,"update class set id='$id', course_id='$course', level='$level', section='$section' where id='$id'");
	header('location:class.php');
	ob_end_flush();
	exit(0);

?>