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
      <?php 
          $examId = $_GET['id'];
          $selExam = mysqli_query($conn, "SELECT * FROM exam WHERE ex_id='$examId' ");
          $result=mysqli_fetch_assoc($selExam)
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
         <div class="content-header">
          <div class="container-fluid">
             <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>RESULT'S for</b> <?php echo $result['ex_title']; ?> <?php echo $result['ex_description'];?></h1>
         </div>
      </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-6 col-3">
        	<div class="main-card mb-6 card card-outline card-primary">
                <div class="card-body">
                	<h5 class="card-title">Your Answer's</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
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
	                 </table>
                </div>
            </div>
        </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              <h3>Score</h3>
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
              <h3>Percentage</h3>
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
    </div>
    </div>
</div>

<!-- ./wrapper -->
<?php

include '../scripts.php';
?>
</body>
</html>