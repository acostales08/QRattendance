<?php 
ob_start();
session_start();
include '../head.php';
include '../config.php';
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
    <a><b>Richwell Colleges</b>Incorporated</a>
  </div>
  <?php include('../message.php'); 

        if(isset($_GET['token'])){
          $token = $_GET['token'];
          $query = mysqli_query($conn, "SELECT * FROM forgot_password WHERE token = '$token'");
          if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            $email = $row['email'];
          }
        }
      ?> 
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $email?></div>
   <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
      <!-- /.lockscreen-image -->
  <!-- lockscreen image -->
      
    <div class="lockscreen-image">
      <img src="../../dist/img/1627260420_checklist.jpg" alt="User Image">
    </div>

    <!-- lockscreen credentials (contains the form) -->
    
    <form class="lockscreen-credentials" action="rec_pass_code.php?id=$token" id="r-login" method="post">
    <div class="input-group">
          <input type="hidden" name="token" class="form-control" value="<?php echo $token?>">
          <input type="hidden" name="email" class="form-control" value="<?php echo $email?>">
      </div>
      <div class="input-group">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="input-group">
        <input type="password" class="form-control" name="confirmpassword" placeholder="confirm password">

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

</div>
<!-- /.center -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
