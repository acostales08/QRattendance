<?php
	include('../config.php');
	$id=$_GET['id'];
                	
	mysqli_query($conn,"delete from exam where ex_id='$id'");
	header('location:exam.php');

	$del=$_GET['id'];
	mysqli_query($conn,"delete from exam_question where eqt_id='$del'");
	header('location:exam.php');

?>