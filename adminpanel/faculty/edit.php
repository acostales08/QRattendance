<?php
include '../../pages/config.php';
	$id=$_GET['id'];
    
	$id_no =$_POST['id_no'];
	$name =$_POST['name'];
    $email =$_POST['email'];
	$contact =$_POST['contact'];
    $address =$_POST['Address'];
	
	
	mysqli_query($conn,"UPDATE faculty set id_no='$id_no', name='$name', email='$email', contact='$contact', address='$address' where id='$id'");
	header('location:faculty.php');
	ob_end_flush();
	exit(0);

?>