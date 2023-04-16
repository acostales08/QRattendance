<?php 
ob_start();
session_start();
include '../head.php';
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
  border-radius: 50%;
  background-color: #fff;
  left: -50px;
  padding: 0px;
  position: absolute;
  top: -30px;
  z-index: 10;
}
  </style>

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a><b>Richwell Colleges</b>Incorporated</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">TEACHER</div>
  <?php include('../message.php'); ?>
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../../dist/img/1627260420_checklist.jpg" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" action="pass_req_code.php" autocomplete="off" id="r-login" method="post">
      <div class="input-group">
      <input type="email" class="form-control" name="email" placeholder="email">

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
