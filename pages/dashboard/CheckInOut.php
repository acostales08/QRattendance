<?php
session_start();
ob_start();
include '../config.php';
    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		$class_subject =$_POST['class'];
		date_default_timezone_set('Asia/Manila');
		$date = date('Y-m-d');
		$time = date("g:i A");

		$sql = "SELECT * FROM student_class_subject WHERE StudentID = '$studentID'";
		$query = mysqli_query($conn, $sql);

		if(empty($class_subject)){
			$_SESSION['error'] = "please select class per subject first";
			header("location: scan_attendance.php?id=$class_subject");
			exit(0);
		}else{
			if(mysqli_num_rows($query) < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$studentID;
		}else{
				$row = mysqli_fetch_assoc($query);
				$id = $row['StudentID'];
				$query =mysqli_query($conn, "SELECT * FROM attendance WHERE StudentID='$id' AND LOGDATE='$date' AND STATUS='PRESENT' AND class_subject_id = '$class_subject'");
				if(mysqli_num_rows($query) > 0){
					$_SESSION['info'] ='Already Time In: '.$row['FullName']; $conn->error;
				 }else{
				$sql = mysqli_query($conn, " INSERT INTO attendance (class_subject_id, StudentID, TIMEIN, LOGDATE, STATUS) VALUES ('$class_subject', '$studentID','$time','$date','PRESENT')");
				$_SESSION['success'] = 'Successfuly Time In: '.$row['FullName'];
		   }	
		}
		}


	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: scan_attendance.php?id=$class_subject");
exit(0);
$conn->close();
?>