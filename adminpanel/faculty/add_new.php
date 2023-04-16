<?php
session_start();
include '../../pages/config.php';
	
	$id_no =$_POST['id_no'];
	$name =$_POST['name'];
    $email =$_POST['email'];
	$contact =$_POST['contact'];
    $address =$_POST['address'];
	$password =md5($_POST['password']);

	$query = mysqli_query($conn, "SELECT * FROM faculty where id_no = '$id_no'");

	if (mysqli_num_rows($query) > 0) {
		$_SESSION['message'] = "ID number is already exist";
		header('location:faculty.php');
		ob_end_flush();
			exit(0);

	}else{

			
	mysqli_query($conn,"insert into faculty (id_no, name, email, contact, address, Password) values ('$id_no', '$name','$email', '$contact','$address', '$password')");
	header('location:faculty.php');
	ob_end_flush();
	exit(0);
	}


?>