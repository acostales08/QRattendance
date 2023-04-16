<?php 
include '../../pages/config.php';
session_start();
ob_start();
error_reporting(0);


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
    $row =  mysqli_fetch_assoc($query);

    if ($row) { // if user exists
        if ($row['username'] === $username) {
            $_SESSION['message'] = "Username already exists";

        }
    
        if ($row['email'] === $email) {
            $_SESSION['message'] = "email already exists";

        }if($password !== $confirmpassword){
            $_SESSION['message'] = "not march password";
        }
      }else{
        $query = mysqli_query($conn,"INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$confirmpassword')");
            header('location: index.php');
        }
      }

?>

<!DOCTYPE html>
<html lang="en">
<?php
include "../../pages/head.php";
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary" style="border-radius: 15px;">
    <div class="card-header text-center" >
        <img src="../../dist/img/logo.png" alt="rci logo" style="height:9rem;">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registration form</p>
      <?php include('../message.php') ?>
          <form action="" 
                method="post" 
                class="login-email">
                <div class="input-group mb-3">
              <input type="text" 
                      class="form-control" 
                      name="username" 
                      placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" 
                      class="form-control" 
                      name="email" 
                      placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" 
                      class="form-control" 
                      name="password" 
                      placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" 
                      class="form-control" 
                      name="confirmpassword" 
                      placeholder="Confirm Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div>
            <div>
            <a href="index.php">Login</a>
          </div></br>
              <!-- /.col -->
              <div>
                <button type="submit" 
                        name="submit" 
                        class="btn btn-primary">Sign In</button>
              </div>
          </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
</body>
</html>
