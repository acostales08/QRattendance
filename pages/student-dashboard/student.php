<?php 

session_start();
ob_start();

if (!isset($_SESSION['student'])) {
    header("Location: ../../pages/login/login.php");
    ob_end_flush();
    exit(0);
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
          <a class="d-block" style="font-size: 25px; margin: 0 50px;">STUDENT</a>
        </div>
      </div>
      
 <?php include 'sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
      </aside>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Available Exam's</b></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">WELCOME</li>
                <li class="breadcrumb-item active"><?php echo $_SESSION['student']?></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
      </div>
    </div>
        <?php
          $exmneId = $_SESSION['sid'];
     
          $selExmneeData = mysqli_query($conn, "SELECT * FROM student_info join class on class.id=student_info.class_id where student_info.sid='$exmneId' ");
          $result = mysqli_fetch_assoc($selExmneeData);
          $exmneClass =  $result['class_id'];
          
        ?>
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body table-responsive p-0">
                  <?php include('../message.php'); ?>
                  
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Exam Title</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                
                              
                                $i = 1;
                                $selExam = mysqli_query($conn, "SELECT * FROM exam WHERE class_id='$exmneClass' ORDER BY ex_id asc ");
                                
                                while($row=mysqli_fetch_assoc($selExam)){
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $i++ ?></td>
                                <td class="text-center"><?php echo $row['ex_title']; ?></td>
                                <td class="text-center"><?php echo $row['ex_description']; ?></td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" href="#start<?php echo $row['ex_id']; ?>">
                                      <i class="fas fa-check">
                                        </i>
                                        Start now
                                    </a>
                                    <?php include('button.php'); ?>
                                </td>
                              </tr>
                                
                             <?php 
                                } ?>
                            </tbody>
                        </table>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
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
