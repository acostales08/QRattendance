<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../../pages/head.php';
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
        <div class="card-header text-center" >
            <img src="../../dist/img/logo.png" alt="rci logo" style="height:9rem;">
        </div>
    <div class="card-body">
    <?php include('../message.php'); ?>
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="pass_req_code.php" autocomplete="off" method="post" id="ForgotPasswordForm">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
          <div class="col-md-12">
            <button type="submit" name="submit_btn" class="btn btn-primary btn-block">Reset password</button>
          </div>
          <!-- /.col -->
        
      </form>
      <p class="text-center">
        <a href="index.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<?php
include '../../pages/scripts.php';
?>
</body>
</html>