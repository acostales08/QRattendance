<?php
	include'../config.php';

	$class_id = $_POST['class_id'];
	$time = $_POST['examLimit'];
	$examQuestDipLimit = $_POST['examQuestDipLimit'];
	$title = $_POST['title'];
	$discription = $_POST['discription'];
	
	$query=mysqli_query($conn,"INSERT INTO exam (class_id, ex_time_limit, ex_questlimit_display, ex_title, ex_description) VALUES ('$class_id', '$time', '$examQuestDipLimit', '$title', '$discription')");
	header('location:exam.php');
	exit(0);


  
	  // Close the connection after using it
	  $conn->close();

?>
