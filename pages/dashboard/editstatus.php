<?php
	include('../config.php');
	
	$id=$_GET['id'];
	
    $status = $_POST['status'];

	
	
	mysqli_query($conn,"update attendance set ID='$id', STATUS='$status' where ID='$id'");
	header('location:scan_attendance.php');

?>

