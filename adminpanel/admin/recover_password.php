<?php session_start();
ob_start();?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../../pages/head.php';
include '../../pages/config.php';
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
         <div class="card-header text-center" >
            <img src="../../dist/img/logo.png" alt="rci logo" style="height:9rem;">
        </div>
    <div class="card-body">
    <?php include('../message.php'); ?>
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <?php
        if(isset($_GET['token'])){
          $token = $_GET['token'];
          $query = mysqli_query($conn, "SELECT * FROM forgot_password WHERE token = '$token'");
          if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            $email = $row['email'];
          }
        }
      ?>
      <form action="rec_pass_code.php?id=$token" method="post">
      <div class="input-group mb-3">
      <input type="hidden" name="token" class="form-control" value="<?php echo $token?>">
          <input type="text" name="email" class="form-control" value="<?php echo $email?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="submit_btn" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>