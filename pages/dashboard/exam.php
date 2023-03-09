<?php 
session_start();
include '../head.php';
include '../navbar.php';
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini layout-fixed">
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div> -->
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
  <div class="main-panel">
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Manage Exam</b></h1>
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
            <!-- /.content-header -->
            <div class="row">
              <div class="col-md-12 grid-margin" id="exam">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        
                        <a href="#add-exam" class="btn btn-md btn-outline-primary edit_class_subject" data-toggle="modal" class="btn btn-primary"> Add Exam</a>
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
                    <?php

                        $sql =mysqli_query($conn, "SELECT e.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM exam e 
                        inner join `class` c on c.id = e.class_id 
                        inner join courses co on co.id = c.course_id ");
                        ?>

                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Exam title</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Time limit</th>
                                    <th class="text-center">Display limit</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                                while($row = mysqli_fetch_assoc($sql)){
                              ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++?></td>
                                                <td class="text-center"><?= $row['ex_title']; ?></td>
                                                <td class="text-center"><?= $row['class']; ?></td>
                                                <td class="text-center"><?= $row['ex_description']; ?></td>
                                                <td class="text-center"><?= $row['ex_time_limit']; ?></td>
                                                <td class="text-center"><?= $row['ex_questlimit_display']; ?></td>
                                                <td class="project-actions text-center">
                                                    <a class="btn btn-primary btn-sm" href="manage-exam.php?id=<?php echo $row['ex_id']; ?>">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        View
                                                    </a>
                                                    <a class="btn btn-info btn-sm" data-toggle="modal" href="#edit<?php echo $row['ex_id']; ?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" href="#del<?php echo $row['ex_id']; ?>">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </a>
                                                    <?php include('button.php'); ?>
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
          </div>
          <!-- partial -->
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
    <?php
   include '../footer.php';
    include 'add_modal.php';
    include '../scripts.php';
    exit();
    ?>
</body>
</html>



