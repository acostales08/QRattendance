<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../../adminpanel/admin/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../../pages/head.php';
include '../../pages/navbar.php';
include '../../pages/config.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../pages/admin/admin.php" class="brand-link">
      <img src="../../dist/img/logo.png" alt="RCI Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Richwell Colleges Inc.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../../pages/profile/profile.php" class="d-block"><?php echo $_SESSION['username']?></a>
        </div>
      </div>
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 15px;">ADMINISTRATOR</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <?php include '../sidebar.php';?>
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
             <h1 class="m-0"><span style = "color: yellow; font-size: 40px; width: 2rem;"><b>|</span>Dashboard</b></h1>
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                
                $query= "SELECT StudentID fROM student_info ORDER BY StudentID";
                $query_run = mysqli_query($conn, $query);
                
                $rows = mysqli_num_rows($query_run);
                
                 echo '<h3>'. $rows.'</h3>';
                ?>
                <p>Enrolled Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-person-add"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>2022</h3>
                <p>School Year</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>1st<sup style="font-size: 20px"></sup></h3>

                <p>Semester</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                
                $query= "SELECT id_no fROM faculty ORDER BY id_no";
                $query_run = mysqli_query($conn, $query);
                
                $rows = mysqli_num_rows($query_run);
                
                 echo '<h3>'. $rows.'</h3>';
                ?>
                <p>Faculty</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<?php
include '../../pages/scripts.php';
?>
</body>
</html>
