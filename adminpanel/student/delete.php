<?php
include '../../pages/config.php';
	$id=$_GET['id'];
	mysqli_query($conn,"delete from student_info where sid='$id'");
	header('location:student.php');
	ob_end_flush();
	exit(0);

?>