<?php
include '../../pages/config.php';
	
	$id_no =$_POST['id_no'];
	$name =$_POST['name'];
    $email =$_POST['email'];
	$contact =$_POST['contact'];
    $address =$_POST['address'];
	$password =md5($_POST['password']);
	
	mysqli_query($conn,"insert into faculty (id_no, name, email, contact, address, Password) values ('$id_no', '$name','$email', '$contact','$address', '$password')");
	header('location:faculty.php');

?>