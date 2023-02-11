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
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div>
<!-- Site wrapper -->
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
          <a class="d-block" style="font-size: 25px; margin: 0 50px;">TEACHER</a>
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h2 style="color: purple;"><b><?php date_default_timezone_set('Asia/Manila'); echo date("l") ." ". date('Y-m-d') ?></b></br></h2>
                <h2 style="color: purple;"><b><?php echo date("g:i A") ?></b></br></h2>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">WELCOME</li>
                    <li class="breadcrumb-item active"><?php echo $_SESSION['faculty']?></li>
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
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
include '../footer.php';
include '../scripts.php';
exit();
?>
</body>
</html>
