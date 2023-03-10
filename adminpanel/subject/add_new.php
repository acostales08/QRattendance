<?php
	include'../../pages/config.php';
	session_start();
	
	$sName=$_POST['subjectName'];
	$descrip=$_POST['description'];

	$query = mysqli_query($conn, "SELECT * FROM subjects where subject = '$sName' AND description  = '$descrip'");

	if (mysqli_num_rows($query) > 0) {
		$_SESSION['message'] = "Subject is already exist";
		header('location:subject.php');
		ob_end_flush();
			exit(0);

	}else{
	
	mysqli_query($conn,"insert into subjects (subject, description) values ('$sName', '$descrip')");
	header('location:subject.php');
	ob_end_flush();
	exit(0);
	}

?>