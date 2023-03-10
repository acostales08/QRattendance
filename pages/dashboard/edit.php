<?php
	include('../config.php');
	
	$id=$_GET['id'];
	
    $class_id = $_POST['class_id'];
	$time = $_POST['examLimit'];
	$examQuestDipLimit = $_POST['examQuestDipLimit'];
	$title = $_POST['title'];
	$discription = $_POST['discription'];
	
	
	mysqli_query($conn,"UPDATE exam set ex_id='$id', class_id='$class_id', ex_title='$title', ex_time_limit='$time', ex_questlimit_display='$examQuestDipLimit', ex_description='$discription' WHERE ex_id='$id'");
	header('location:exam.php');
	ob_end_flush();
		   exit(0);
?>

