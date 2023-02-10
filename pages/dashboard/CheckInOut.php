<?php
    session_start();
include '../config.php';
    if(isset($_POST['studentID'])){
        
        $studentID =$_POST['studentID'];
		$date = date('Y-m-d');
		date_default_timezone_set('Asia/Manila');
		$time = date("g:i A");

		$sql = "SELECT * FROM student_info WHERE StudentID = '$studentID'";
		$query = mysqli_query($conn, $sql);

		if(mysqli_num_rows($query) < 1){
			$_SESSION['error'] = 'Cannot find QRCode number '.$studentID;
		}else{
				$row = mysqli_fetch_assoc($query);
				$id = $row['StudentID'];
				$query =mysqli_query($conn, "SELECT * FROM attendance WHERE StudentID='$id' AND LOGDATE='$date' AND STATUS='PRESENT'");
				if(mysqli_num_rows($query) > 0){
					$_SESSION['info'] = $conn->error;
			 }else{
				$sql = mysqli_query($conn, " INSERT INTO attendance (StudentID, TIMEIN, LOGDATE, STATUS) VALUES ('$studentID','$time','$date','PRESENT')");
				$_SESSION['success'] = 'Successfuly Time In: '.$row['FullName'];
		   }	
		}
	

	}else{
		$_SESSION['error'] = 'Please scan your QR Code number';
}
header("location: scan_attendance.php");
	   
$conn->close();
?>