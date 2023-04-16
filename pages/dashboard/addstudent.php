<?php
session_start(); 
include '../config.php';
    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		$c_subject =$_POST['class'];

		$sql = "SELECT * FROM student_info WHERE StudentID = '$studentID'";
		$query = mysqli_query($conn, $sql);

		if(empty($c_subject)){
			$_SESSION['error'] = "please select class per subject first";
			header("location: class.php?id=$c_subject");
			ob_end_flush();
		   exit(0);
		}else{
			if(mysqli_num_rows($query) < 1){
				$_SESSION['error'] = 'Cannot find QRCode number '.$studentID;
			}else{
					$row = mysqli_fetch_assoc($query);
					$sid = $row['sid'];
					$FullName = $row['FullName'];
					$Gender = $row['Gender'];
					$class_id = $row['class_id'];
					$email = $row['Email'];
					

					$query =mysqli_query($conn, "SELECT * FROM student_class_subject WHERE StudentID='$studentID' AND class_subject_id='$c_subject'");
					if(mysqli_num_rows($query) > 0){
						$_SESSION['info'] = "Already in the class"; $conn->error;
					}else{
					$sql = mysqli_query($conn, " INSERT INTO student_class_subject (class_subject_id, StudentID, FullName, Gender, class_id, Email,sid) VALUES ('$c_subject', '$studentID','$FullName','$Gender','$class_id', '$email', '$sid')");

			}	
			}	
		}
		
	

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: class.php?id=$c_subject");
ob_end_flush();
exit(0);
$conn->close();
?>