<?php
session_start();
include '../head.php';
include '../navbar.php';
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
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
                    <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Exam Result</b></h1>
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
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body table-responsive p-0">
                    <p class="card-title text-md-center text-xl-left">Exam</p>
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">

                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                            <tr>
                                <td class="text-center">#</td>
                                    <th width="25%">Examinee Fullname</th>
                                    <th>Exam Name</th>
                                    <th>Scores</th>
                                    <th>Ratings</th>
                                    <th>Section</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = mysqli_query($conn, "SELECT s.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM student_info s 
                                INNER JOIN class c on c.id = s.class_id
                                inner join courses co on co.id=c.course_id
                                INNER JOIN exam_attempt ea ON s.sid = ea.exmne_id ORDER BY ea.examat_id AND concat(co.course,' ',c.level,'-',c.section) DESC ");
                                if(mysqli_num_rows($selExmne) > 0)
                                {
                                    $i = 1;
                                    while ($selExmneRow = mysqli_fetch_assoc($selExmne)) { ?>
                                        <tr>
                                            <th class="text-center"><?php echo $i++; ?></th>
                                           <td><?php echo $selExmneRow['FullName']; ?></td>
                                           <td>
                                             <?php 
                                                $eid = $selExmneRow['sid'];
                                                $selExName = mysqli_query($conn,"SELECT * FROM exam e INNER JOIN exam_attempt ea ON e.ex_id=ea.exam_id WHERE  ea.exmne_id='$eid' ");
                                                $result = mysqli_fetch_assoc($selExName);
                                                $exam_id = $result['ex_id'];
                                                echo $result['ex_title'];
                                              ?>
                                           </td>
                                           <td>
                                                    <?php 
                                                    $selScore = mysqli_query($conn,"SELECT * FROM exam_question eq INNER JOIN exam_answers ea ON eq.eqt_id = ea.quest_id AND eq.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                      ?>
                                                <span>
                                                    <?php echo mysqli_num_rows($selScore); ?>
                                                    <?php 
                                                        $over  = $result['ex_questlimit_display'];
                                                     ?>
                                                </span> / <?php echo $over; ?>
                                           </td>
                                           <td>
                                              <?php 
                                                    $selScore = mysqli_query($conn,"SELECT * FROM exam_question eq INNER JOIN exam_answers ea ON eq.eqt_id = ea.quest_id AND eq.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                ?>
                                                <span>
                                                    <?php 
                                                        $score = mysqli_num_rows($selScore);
                                                        $ans = $score / $over * 100;
                                                        echo "$ans";
                                                        echo "%";
                                                        
                                                     ?>
                                                </span> 
                                           </td>
                                           <td><?php echo $selExmneRow['class']; ?></td>

                                        </tr>
                                    <?php }
                                }

                               ?>
                            </tbody>
                        </table>
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
    include '../scripts.php';
    exit();
    ?>
</body>
</html>



