<?php
session_start();
ob_start();
include '../head.php';
include '../navbar.php';
require '../config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $errmsg_arr = array();
  $errflag = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div>
<div class="container-scroller">
<div class="container-scroller">
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
      <?php include '../dashboard/sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?php 
   $exId = $_GET['id'];

   $selQuest = mysqli_query($conn,"SELECT * FROM exam_question WHERE exam_id='$exId' ORDER BY q_type asc");

  
 ?>
  <div class="main-panel">
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
              <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>Add </b>Question </h1>
          </div>
       </div>
       <div id="refreshData">
            <div class="row">
              <div class="col-md-12 grid-margin" id="exam">
                <div class="d-flex justify-content-between align-items-center">
        
                    <div class="btn-actions-pane-right">
                    <button class="btn btn-sm btn-outline-primary " data-toggle="modal" data-target="#add-question">Add Question</button>
                    </div>
                  <div>
                
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body">
                  <?php include('../message.php'); ?>
                    <p class="card-title text-md-center text-xl-left">Exam's Question</p>
          
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                 <div class="table-responsive">
                                 <?php 
                               
                               if(mysqli_num_rows($selQuest) > 0)
                               {  ?>
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                                        <thead>
                                        <tr>
                                            <th class="text-left pl-1">Course Name</th>
                                            <th class="text-center" width="20%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            
                                            if(mysqli_num_rows($selQuest) > 0)
                                            {
                                               $i = 1;
                                               while ($selQuestionRow = mysqli_fetch_assoc($selQuest)) { ?>
                                               <?php
                                                if($selQuestionRow['q_type'] == "Identification"){?>
                                                <tr>
                                                  <td>
                                                     <b><?php echo $i++ ; ?> .) <?php echo $selQuestionRow['exam_question']; ?></b><br>
                                                     <b>Answer :</b><span class="pl-4 text-success"><?php echo  $selQuestionRow['exam_answer']; ?></span><br>

                                                            
                                                  </td>
                                                  <td class="project-actions text-right">
                                                        <a href="#edit<?php echo $selQuestionRow['eqt_id']; ?>"class="btn btn-sm btn-info " data-toggle="modal"><i class="fas fa-pencil-alt">
                                                        </i>Edit
                                                      </a>
                                                        
                                                        <form action="delquestion.php" method="POST" class="d-inline">
                                                        <input type="hidden" name="delete" value="<?php echo $exId; ?>">
                                                        <button type="submit" name="exId" value="<?php echo $selQuestionRow['eqt_id'];?>s" class="btn btn-danger btn-sm swalDefaultError"><i class="fas fa-trash">
                                                        </i>Delete</button>
                                                       
                                                    </form>
                                                    <?php include('editquestion.php'); ?>
                                                        </td>
                                                </tr>


                                              <?php  } elseif($selQuestionRow['q_type'] == "Multiple Choice") {?>
                                                <tr>
                                                        <td >
                                                            <b><?php echo $i++ ; ?> .) <?php echo $selQuestionRow['exam_question']; ?></b><br>
                                                            <?php 
                                                              // Choice A
                                                              if($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">A - <?php echo  $selQuestionRow['exam_ch1']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">A - <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
                                                              <?php }

                                                              // Choice B
                                                              if($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
                                                              <?php }

                                                              // Choice C
                                                              if($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
                                                              <?php }

                                                              // Choice D
                                                              if($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer'])
                                                              { ?>
                                                                <span class="pl-4 text-success">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                              <?php }
                                                              else
                                                              { ?>
                                                                <span class="pl-4">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
                                                              <?php }

                                                             ?>
                                                            
                                                        </td>
                                                        <td class="project-actions text-right">
                                                        <a href="#edit<?php echo $selQuestionRow['eqt_id']; ?>"class="btn btn-sm btn-info " data-toggle="modal"><i class="fas fa-pencil-alt">
                                                        
                                                        </i>Edit</a>
                                                        
                                                        <form action="delquestion.php" method="POST" class="d-inline">
                                                        <input type="hidden" name="delete" value="<?php echo $exId; ?>">
                                                        <button type="submit" name="exId" value="<?php echo $selQuestionRow['eqt_id'];?>s" class="btn btn-danger btn-sm swalDefaultError"><i class="fas fa-trash">
                                                        </i>Delete</button>
                                                        
                                                    </form>
                                                    <?php include('editquestion.php'); ?>
                                                        </td>
                                                    </tr>
                                               <?php }else{?>
                             
                                            <?php } ?>

                                            <?php }?>
                                                
                                          <?php  }
                                            else
                                            { ?>
                                                <tr>
                                                  <td colspan="2">
                                                    <h3 class="p-3">No question found...</h3>
                                                  </td>
                                                </tr>
                                            <?php }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php }
                               else
                               { ?>
                                  <h4 class="text-primary">No question found...</h4>
                                 <?php
                               }
                             ?>
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
    include 'add_modal.php';
    include '../scripts.php';
    exit();
    ?>
</body>
</html>