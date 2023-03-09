<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../navbar.php';
include '../config.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
  </div>
<div class="container-scroller">
<div class="container-scroller">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="../../dist/img/logo.png" alt="RCI Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Richwell Colleges Inc.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 50px;">TEACHER</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <?php include 'sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
      <div class="main-panel">
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Change Password</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">WELCOME</li>
                        <li class="breadcrumb-item active"><?php echo $_SESSION['faculty']?></li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
              </div>
            </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card card-outline card-primary">
                <div class="card-body table-responsive p-0">
                  <?php include('../message.php') ?>
                  <p class="card-title text-md-center text-xl-left"></p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <form method="POST" action="change.php">
                <div class="card-body">
                <div class="form-group">
                    <label for="oldpassword">Old password</label>
                    <input type="password" name="old_password" class="form-control"  placeholder="Enter old password" required>
                  </div>
                  <div class="form-group">
                    <label for="newpassword">New password</label>
                    <input type="password" name="new_password" class="form-control"  placeholder="Enter new password" required>
                  </div>
                  <div class="form-group">
                    <label for="repeatpassword">Repeat Password</label>
                    <input type="password" name="repaet_password" class="form-control" id="exampleInputPassword1" placeholder="Repeat password" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php
  include '../footer.php';
    include '../scripts.php';
    exit();
    ?>
</body>
</html>