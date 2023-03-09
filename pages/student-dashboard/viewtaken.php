<?php 

session_start();

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
      <?php 
          $examId = $_GET['id'];
          $selExam = mysqli_query($conn, "SELECT * FROM exam WHERE ex_id='$examId' ");
          $result=mysqli_fetch_assoc($selExam)
      ?>
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
             <h1 class="m-0"><span style = "color: yellow; font-size: 40px; width: 2rem;"><b>|</span>Dashboard</b></h1>
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-12">
          <div class="main-card mb-6 card card-outline card-primary">
                <div class="card-body p-5 table-responsive p-0">
                	<h5 class="card-title">Your Answer's</h5>

                            <?php 
                            $exmneId = $_SESSION['sid'];
                            $i = 1;
                                $selQuest = mysqli_query($conn,"SELECT * FROM exam_question eq INNER JOIN exam_answers ea ON eq.eqt_id = ea.quest_id WHERE eq.exam_id='$examId' AND ea.axmne_id='$exmneId' AND ea.exans_status='new' ");
                                
                                while ($selQuestRow = mysqli_fetch_assoc($selQuest)) { ?>
                                    <tr>
                                </br>

                                        <td>
                                            <b><p><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></p></b>
                                            <label class="pl-4 text-success">
                                                Answer : 
                                                <?php 
                                                    if($selQuestRow['exam_answer'] != $selQuestRow['exans_answer'])
                                                    { ?>
                                                        <span style="color:red"><?php echo $selQuestRow['exans_answer']; ?></span>
                                                    <?PHP }
                                                    else
                                                    { ?>
                                                        <span class="text-success"><?php echo $selQuestRow['exans_answer']; ?></span>
                                                    <?php }
                                                ?>
                                            </label>
                                        </td>
                                    </tr>
                                <?php }
                            ?>

                </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              <h5>Score</h5>
              <?php 
                  $selScore = mysqli_query($conn, "SELECT * FROM exam_question eq INNER JOIN exam_answers ea ON eq.eqt_id = ea.quest_id AND eq.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                  ?>
                <span>
                  <?php $result1 = mysqli_num_rows($selScore); ?>
                  <?php 
                        $over  = $result['ex_questlimit_display'];
                  ?>
                  <h3><?php echo $result1; ?> / <?php echo $over; ?><sup style="font-size: 20px"></sup></h3></br>
                  </span>
                
                
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
              <h5>Percentage</h5>
              <?php 
                  $selScore = mysqli_query($conn,"SELECT * FROM exam_question eq INNER JOIN exam_answers ea ON eq.eqt_id = ea.quest_id AND eq.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                    ?>
                    <span>
                    <h3>
                      <?php 
                          $score = mysqli_num_rows($selScore);
                             $ans = $score / $over * 100;
                               echo "$ans";
                              echo "%";
                                    
                     ?>
                <sup style="font-size: 20px;"></sup></h3></br>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
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
include '../footer.php';
include '../scripts.php';
exit();
?>
</body>
</html>