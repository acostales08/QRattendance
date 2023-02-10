<?php 

session_start();

if (!isset($_SESSION['faculty'])) {
    header("Location: ../../pages/login/login2.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../navbar.php';
include '../config.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
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
          <a href="../../pages/profile/profile.php" class="d-block"><?php echo $_SESSION['faculty']?></a>
        </div>
      </div>
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 15px;">TEACHER</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
    <?php include 'sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0"><span style = "color: purple;" ><h1><b>| Dashboard</b></span></h1>
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                $id = $_SESSION['id'];
                $class = mysqli_query($conn, "SELECT * FROM class_subject cs
                INNER JOIN subjects s on s.id = cs.subject_id
                INNER JOIN faculty f on f.id = cs.faculty_id
                WHERE cs.subject_id AND cs.faculty_id = '$id'");
                $row = mysqli_num_rows($class);
                
                  echo '<h3>'. $row .'</h3>'
               
                ?>
                <p>subject</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $id = $_SESSION['id'];
                $class = mysqli_query($conn, "SELECT * FROM class_subject cs
                INNER JOIN class c on c.id = cs.class_id
                INNER JOIN faculty f on f.id = cs.faculty_id
                WHERE cs.faculty_id = '$id'");
                $row = mysqli_num_rows($class);
                
                  echo '<h3>'. $row .'<sup style="font-size: 20px"></sup></h3>'
               
                ?>
                

                <p>class</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>60</h3>

                <p>Total Student</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>oct. 10 2022</h3>

                <p>date</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-person-add"></i>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
include '../scripts.php';
?>
</body>
</html>
