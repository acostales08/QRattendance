<?php
	include('../config.php');
	$id=$_GET['id'];
                	
	mysqli_query($conn,"delete from exam where ex_id='$id'");
	header('location:exam.php');
	exit(0);

?>