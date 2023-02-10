<?php 

session_start();

if (!isset($_SESSION['student'])) {
    header("Location: ../../pages/student-dashboard/student.php");
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
<?php if (isset($_SESSION['student'])) :?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../../pages/profile/profile.php" class="d-block"><?php echo $_SESSION['student'] ?></a>
        </div>
      </div>
   
      <div class="user-panel ">
        <div class="info">
          <a href="#" class="d-block">Student</a>
        </div>
      </div>
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="student.php" class="nav-link ">
                <i class="nav-icon fa fa-braille"></i>
                <p>
                  Avalable Exam
                </p>
              </a>
            </li>
             <li class="nav-item"> 
              <a href="taken.php" class="nav-link active">
                <i class="nav-icon fa fa-inbox"></i>
                <p>
                  Taken Exam
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-cogs"></i>
                <p>
                  Setting
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-user-lock"></i>
                    <p>Chage Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../logout.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                  </a>
                </li>
            </ul>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
      </aside>
      <div class="main-panel">
        <div class="content-wrapper">
         <div class="content-header">
          <div class="container-fluid">
             <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>All Exam's </b></h1>
         </div>
      </div>
        <?php
          $exmneId = $_SESSION['sid'];
          endif;
  
          $selExmneeData = mysqli_query($conn, "SELECT * FROM student_info join class on class.id=student_info.class_id join courses on courses.id=class.course_id where student_info.sid='$exmneId' ");
          $result = mysqli_fetch_assoc($selExmneeData);
          $exmneCourse =  $result['course_id'];
          
        ?>
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body">
                  <?php include('../message.php'); ?>
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Exam Title</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Score</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                
                              
                                $i = 1;
                                $selTakenExam = mysqli_query($conn, "SELECT * FROM exam et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE exmne_id='$exmneId' ORDER BY ea.examat_id DESC ");
                                
                                while($row=mysqli_fetch_assoc($selTakenExam)){
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $i++ ?></td>
                                <td class="text-center"><?php echo $row['ex_title']; ?></td>
                                <td class="text-center"><?php echo $row['ex_description']; ?></td>
                                <?php 
                                  $selScore = mysqli_query($conn, "SELECT * FROM exam_question eq INNER JOIN exam_answers ea ON eq.eqt_id = ea.quest_id AND eq.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id=ea.exam_id AND ea.exans_status='new' ");
                                
                                    $result1 = mysqli_num_rows($selScore); ?>
                                    <?php 
                                          $over  = $row['ex_questlimit_display'];
                                    ?>
                                <td class="text-center"><?php echo $result1; ?> / <?php echo $over; ?></td>
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal" href="#view<?php echo $row['ex_id']; ?>">
                                      <i class="fas fa-folder">
                                        </i>
                                        View
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

include '../scripts.php';
?>
</body>
</html>