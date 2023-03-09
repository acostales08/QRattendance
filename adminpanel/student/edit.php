<?php
include '../../pages/config.php';
	
	$id=$_GET['id'];
	
	$sid=$_POST['studentId'];
	$fName=$_POST['fullName'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$class=$_POST['class_id'];

	
	mysqli_query($conn,"update student_info set sid='$id', StudentID='$sid', FullName='$fName', Gender='$gender', Email='$email', class_id='$class' where sid='$id'");
	header('location:student.php');
	exit(0);

?>

