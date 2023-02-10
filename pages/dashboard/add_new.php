<?php
	include'../config.php';

	$course_id = $_POST['course_id'];
	$time = $_POST['examLimit'];
	$examQuestDipLimit = $_POST['examQuestDipLimit'];
	$title = $_POST['title'];
	$discription = $_POST['discription'];
	
	mysqli_query($conn,"insert into exam (cou_id, ex_time_limit, ex_questlimit_display, ex_title, ex_description) values ('$course_id', '$time', '$examQuestDipLimit', '$title', '$discription')");
	header('location:exam.php');

	if (mysqli_query($conn, $sql)) {
		echo "Employee has been created.";
	  } else {
		return "Error: " . $sql . "<br>" . $conn->error;
	  }
  
	  // Close the connection after using it
	  $conn->close();

?>
