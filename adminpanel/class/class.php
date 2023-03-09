<?php
session_start();
include '../../pages/head.php';
include '../../pages/navbar.php';
include '../../pages/config.php';
?>
<!DOCTYPE html>
<html lang="en">

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
             <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Class</b></h1>
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
         <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        
                    <a href="#add-class" class="btn btn-md btn-outline-primary" data-toggle="modal" class="btn btn-primary"> Add Class</a>                    </div>
                  <div>
                </div>
              </div>
            </div>
          </div>
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
                                    <th class="text-center">Class</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $i = 1;
                              $class1 = mysqli_query($conn,"SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                              while($row=mysqli_fetch_assoc($class1)){

                              ?>
                              <tr>
                                <td class="text-center"><?php echo $i++ ?></td>
                                <td class="text-center">
                                  <p><b><?php echo $row['class'] ?></b></p>
                                </td>
                                <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" data-toggle="modal" href="#edit<?php echo $row['id']; ?>">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" href="#del<?php echo $row['id']; ?>">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        <?php include('button.php'); ?>
                                </td>
                              </tr>
                            <?php  } ?>
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
include '../../pages/footer.php';
    include 'add_modal.php';
    include '../../pages/scripts.php';
    exit();
?>
</body>
</html>
