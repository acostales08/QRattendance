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
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
          <a href="../../pages/profile/profile.php" class="d-block"></a>
        </div>
      </div>
   
      <div class="user-panel ">
        <div class="info">
        <a class="d-block" style="font-size: 25px; margin: 0 15px;">ADMINISTRATOR</a>
        </div>
      </div>
      
      <?php include '../dashboard/sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
      </aside>
      <div class="main-panel">
        <div class="content-wrapper">
         <div class="content-header">
          <div class="container-fluid">
          <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>Student </b>per class</h1>
         </div>
         <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        
                    <a href="#select" class="btn btn-md btn-outline-primary edit_class_subject" data-toggle="modal" class="btn btn-primary"> Select</a>
                </div>
              </div>
            </div>
          </div>
             <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body table-responsive p-0">
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <table id="example1" class="table table-striped" >
                        <thead style="font-size:15px">
                              <tr>
                                  <th class="text-center">#</th>
                                  <th class="text-center">ID #</th>
                                  <th class="text-center">Name</th>
                                  <th class="text-center">Email</th>
                                  <th class="text-center">Class</th>
                                  <th class="text-center">Gender</th>
                                  <th class="text-center">Active</th>
                                  <th class="text-center">view exam</th>
                                  <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                          
                            $classID = $_GET["id"];
     
                             $sql = "SELECT s.*, concat(co.course,' ',c.level,'-',c.section) as `class` FROM student_info s 
                             INNER JOIN class c on c.id = s.class_id
                             INNER JOIN courses co on co.id = course_id WHERE class_id = $classID";
                             $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
     
                                       $i = 1;
                                       while($row = mysqli_fetch_assoc($result)){
                                     ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++?></td>
                                                <td class="text-center"><?= $row['StudentID']; ?></td>
                                                <td class="text-center"><?= $row['FullName']; ?></td>
                                                <td class="text-center"><?= $row['Email']; ?></td>
                                                <td class="text-center"><?= $row['class']; ?></td>
                                                <td class="text-center"><?= $row['Gender']; ?></td>
                                                <td class="text-center"><?= $row['is_active']; ?></td>
                                                <td class="text-center"><?= $row['view']; ?></td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-info btn-sm" data-toggle="modal" href="#edit<?php echo $row['sid']; ?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Update
                                                    </a>
                                                    <?php include('setModal.php'); ?>
                                                </td>
                      
                                            </tr>
                                            <?php } ?>
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
   
   include 'SelectSection.php';
   include '../scripts.php';
   ?>
</body>
</html>
