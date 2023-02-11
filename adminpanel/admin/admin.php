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
    <a class="brand-link">
      <img src="../../dist/img/logo.png" alt="RCI Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Richwell Colleges Inc.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user panel (optional) -->
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
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Dashboard</b></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">WELCOME</li>
                <li class="breadcrumb-item active"><?php echo $_SESSION['username']?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
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
                <?php
                $date = date('Y-m-d');
                $query= "SELECT LOGDATE,count(*) as present from attendance where STATUS = 'PRESENT'AND LOGDATE ='$date'  ";
                $query_run = mysqli_query($conn, $query);
                
                if($query_run->num_rows>0)
                  {
                      while($row = mysqli_fetch_assoc($query_run))
                      {    

                          echo '<h3>' . $row['present'].'</h3>' ;
                          $present = $row['present'];
                      
                      }
                  }else{
                  echo '<h3>no record found</h3>';
                }  
                ?>
                <p>Total present</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $date = date('Y-m-d');
                $query= "SELECT LOGDATE,count(*) as tardy from attendance where STATUS = 'LATE'AND LOGDATE ='$date'  ";
                $query_run = mysqli_query($conn, $query);
                
                if($query_run->num_rows>0)
                  {
                      while($row = mysqli_fetch_assoc($query_run))
                      {    

                          echo '<h3>' . $row['tardy'].'</h3>' ;
                          $tardy = $row['tardy'];
                      }
                  }else{
                  echo '<h3>no record found</h3>';
                }
                
                ?>
                <p>Total tardy</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                $query= "SELECT StudentID fROM student_info ORDER BY StudentID";
                $query_run = mysqli_query($conn, $query);
                
                $rows = mysqli_num_rows($query_run);
                $student =$rows;
                 $total = $student - $present -$tardy;;
                 echo '<h3>'. $total.'</h3>';
                
                 
                ?>
                <p>Total absent</p>
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
</div>
<!-- ./wrapper -->
<?php
include '../../pages/footer.php';
include '../../pages/scripts.php';
exit();
?>
</body>
</html>
