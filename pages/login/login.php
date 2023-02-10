<?php 

include '../config.php';
include '../head.php';

session_start();

error_reporting(0);

if (isset($_SESSION['student'])) {
    header("Location: ../../pages/student-dashboard/student.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
  $is_active = $_POST['is_active'];

	$sql = "SELECT * FROM student_info WHERE Email='$email' AND Password='$password' AND is_active='$is_active'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		 $_SESSION['student'] = $row['FullName'];
     $_SESSION['StudentID'] = $row['StudentID'];
     $_SESSION['sid'] = $row['sid'];
     
		header("Location: ../../pages/student-dashboard/student.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Lockscreen</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<style>
	  .lockscreen-image {
			left: -27px;
			top: -3px;
		}
  </style>

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../../index2.html"><b>Richwell Colleges</b>Incorporated</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">STUDENT</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../../dist/img/1627260420_checklist.jpg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" id="r-login" method="post">
    <div class="input-group">
        <input type="hidden" value="yes" class="form-control" name="is_active">
      </div>
		<div class="input-group">
        <input type="email" class="form-control" name="email" placeholder="email">
      </div>
      <div class="input-group">
        <input type="password" class="form-control" name="password" placeholder="Password">

        <div class="input-group-append">
          <button type="submit" name="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="text-center">
    <a href="login2.php">login as teacher</a>
  </div>

</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
