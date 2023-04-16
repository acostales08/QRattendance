<?php
	include('../config.php');
	
	$id=$_GET['id'];
	$class_subject = $_POST['class'];
    $status = $_POST['status'];

	mysqli_query($conn,"UPDATE attendance set ID='$id', STATUS='$status' where ID='$id'");
	header("location:scan_attendance.php?id=$class_subject");
	ob_end_flush();
		   exit(0);
?>

