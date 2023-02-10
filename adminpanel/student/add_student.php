<?php
include '../../pages/config.php';
	
	$sid=$_POST['studentId'];
	$fName=$_POST['fullName'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$class=$_POST['class_id'];
	$pass=md5($_POST['password']);
	$is_active = $_POST['is_active'];
	
	mysqli_query($conn,"insert into student_info (StudentID, FullName, Gender, Email, class_id, Password, is_active)
	 values ('$sid', '$fName','$gender', '$email','$class', '$pass', '$is_active')");
	header('location:student.php');

?>
