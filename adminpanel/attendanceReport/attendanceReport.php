<!DOCTYPE html>
<html lang="en">
<?php
include '../../pages/head.php';
include '../../pages/navbar.php';
include '../../pages/config.php';
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
          <a href="../../../pages/profile/profile.php" class="d-block"></a>
        </div>
      </div>
   
      <div class="user-panel ">
        <div class="info">
        <a class="d-block" style="font-size: 25px; margin: 0 15px;">ADMINISTRATOR</a>
        </div>
      </div>
      
      <?php include '../sidebar.php';?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
      </aside>
      <div class="main-panel">
        <div class="content-wrapper">
         <div class="content-header">
          <div class="container-fluid">
          <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>Attendance</b> Report</h1>
         </div>
         <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                <div>
                        
                        <a href="#select" class="btn btn-md btn-outline-primary edit_class_subject" data-toggle="modal" class="btn btn-primary"> Select</a>

                    <?php $classID = $_GET["id"];?>
                       <a href="print.php?id=<?php echo $classID?>" target="_blank"><button type="button" class="btn btn-md btn-outline-success edit_class_subject" > <i class="ti-printer btn-icon-prepend"> </i>Print</button></a>
                  </div>
                  <div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body table-responsive p-0">
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                       <table id="example1" class="table table-striped">
                          <thead style="font-size:15px">
                              <tr>
                              <td>#</td>
                              <td>Name</td>
                              <td>Student ID</td>
                              <td>Time</td>
                              <td>Date</td>
                              <td>Status</td>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            
                              $i = 1;
                              $sql ="SELECT * FROM attendance inner JOIN student_info ON attendance.StudentID=student_info.StudentID WHERE class_id = $classID";
                              $query = $conn->query($sql);
                              while ($row = $query->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['FullName'];?></td>
                                    <td><?php echo $row['StudentID'];?></td>
                                    <td><?php echo $row['TIMEIN'];?></td>
                                    <td><?php echo $row['LOGDATE'];?></td>
                                    <td style="color: blue;"><?php echo $row['STATUS'];?></td>
                                </tr>
                            <?php

                            }
                            ?>
                          </tbody>
                      </table>
                    </div>  
                  </div>
                </div>
              </div>
            </div>

      <!-- main-panel ends -->
    </div>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
  include 'classatt.php';
    include '../../pages/scripts.php';
?>
</body>
</html>
