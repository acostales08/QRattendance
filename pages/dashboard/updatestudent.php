<?php
include '../config.php';
	
	$id=$_GET['id'];
	
	$sid=$_POST['studentId'];
	$fName=$_POST['fullName'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$class=$_POST['class_id'];
    $is_active = $_POST['is_active'];
	$view = $_POST['view'];
	
	mysqli_query($conn,"update student_info set sid='$id', StudentID='$sid', FullName='$fName', Gender='$gender', Email='$email', class_id='$class', is_active='$is_active', view='$view' where sid='$id'");
	header("location:manage-access.php?id=$class");
	ob_end_flush();
		   exit(0);
?>
