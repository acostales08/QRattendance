<?php
include '../../pages/config.php';
	$id=$_GET['id'];
	mysqli_query($conn,"delete from courses where id='$id'");
	header('location:course.php');

?>