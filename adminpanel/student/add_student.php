<?php
include '../../pages/config.php';
session_start();

if(isset($_POST['submit'])){
		
	$sid=$_POST['studentId'];
	$fName=$_POST['fullName'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$class=$_POST['class_id'];
	$pass=md5($_POST['password']);
	$is_active = $_POST['is_active'];
	$view = $_POST['view'];

	$query = mysqli_query($conn, "SELECT * FROM student_info where StudentID = '$sid'");

	if (mysqli_num_rows($query) > 0) {

		$_SESSION['message'] = "ID number is already exist";
		header('location:student.php');
		ob_end_flush();
			exit(0);
	}else{
	
	mysqli_query($conn,"insert into student_info (StudentID, FullName, Gender, Email, class_id, Password, is_active, view)
	 values ('$sid', '$fName','$gender', '$email','$class', '$pass', '$is_active', '$view')");
	header('location:student.php');
	ob_end_flush();
	exit(0);

	}

}

?>
