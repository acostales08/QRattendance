<?php 

include '../../pages/config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: ../../adminpanel/admin/admin.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: ../../adminpanel/admin/admin.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
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
      <p class="login-box-msg">Sign in to start your session</p>

          <form action="" 
                method="post" 
                class="login-email">
            <div class="input-group mb-3">
              <input type="email" 
                      class="form-control" 
                      name="email" 
                      value="<?php echo $email; ?>" 
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
                      value="<?php echo $_POST['password']; ?>" 
                      placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
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
