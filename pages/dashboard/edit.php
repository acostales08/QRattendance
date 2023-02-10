<?php
	include('../config.php');
	
	$id=$_GET['id'];
	
    $course_id = $_POST['course_id'];
	$time = $_POST['examLimit'];
	$examQuestDipLimit = $_POST['examQuestDipLimit'];
	$title = $_POST['title'];
	$discription = $_POST['discription'];
	
	
	mysqli_query($conn,"UPDATE exam set ex_id='$id', cou_id='$course_id', ex_title='$title', ex_time_limit='$time', ex_questlimit_display='$examQuestDipLimit', ex_description='$discription' WHERE ex_id='$id'");
	header('location:exam.php');

?>

