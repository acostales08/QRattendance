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
          <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>List of Class per Subject</b></h1>
         </div>
         <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        
                    <a href="#add-subject_class" class="btn btn-md btn-outline-primary edit_class_subject" data-toggle="modal" class="btn btn-primary"> New Entry</a>
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
                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Class</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Faculty</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    $class_subject = mysqli_query($conn, "SELECT cs.*,concat(co.course,' ',c.level,'-',c.section) as `class`,s.subject,f.name as fname FROM class_subject cs inner join `class` c on c.id = cs.class_id inner join courses co on co.id = c.course_id inner join faculty f on f.id = cs.faculty_id inner join subjects s on s.id = cs.subject_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                    while($row=mysqli_fetch_assoc($class_subject)){

                                    
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td class="text-center">
                                            <p> <b><?php echo $row['class'] ?></b></p>
                                        </td>
                                        <td class="text-center">
                                            <p> <b><?php echo $row['subject'] ?></b></p>
                                        </td>
                                        <td class="text-center">
                                            <p> <b><?php echo $row['fname'] ?></b></p>
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
    include 'add_modal.php';
    include '../../pages/scripts.php';
?>
</body>
</html>
