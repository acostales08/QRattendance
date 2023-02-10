<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../navbar.php';
include '../config.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div> -->
<div class="container-scroller">
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
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
          <a href="../../pages/profile/profile.php" class="d-block">Isaiah James B. Gonzales</a>
        </div>
      </div>
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 15px;">TEACHER</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <?php include '../dashboard/sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="main-panel">
      <div class="content-wrapper">
      <div class="row">
        <div class=" col-md-4">
           <div class="content-header">
              <div class="container-fluid">
                  <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>Ranking by exam </b></h1>
              </div>
          </div>
        </div>
        <div class="col-6 col-md-8">

       <?php 
                $exam_id = $_GET['id'];


                if($exam_id != "")
                {
                   $selEx = mysqli_query($conn, "SELECT * FROM exam WHERE ex_id='$exam_id' ");
                   $result = mysqli_fetch_assoc($selEx);
                   $exam_course = $result['cou_id'];
                   

                   $selExmne = mysqli_query($conn,"SELECT s.*, concat(co.course,' ',c.level,'-',c.section) as `class` FROM student_info s 
                   inner join class c on c.id=s.class_id 
                   inner join courses co on co.id=c.course_id   
                   WHERE co.id='$exam_course'  AND s.sid ");
                    
                    
                   ?>
                   <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                
                                    <br>
                                    <span class="border" style="padding:10px;color:black;background-color: yellow;">Excellence</span>
                                    <span class="border" style="padding:10px;color:white;background-color: green;">Very Good</span>
                                    <span class="border" style="padding:10px;color:white;background-color: blue;">Good</span>
                                    <span class="border" style="padding:10px;color:white;background-color: red;">Failed</span>
                                    <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">Not Answering</span>
                                </div>
                            </div>
                        </div>    
        </div>
      </div>

              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Exam</p>
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">

                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                            <tr>
                              <th class="text-center">#</th>
                                    <th width="25%">Examinee Fullname</th>
                                    <th>Score / Over</th>
                                    <th>Percentage</th>
                                    <th>section</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i = 1;
                                while ($selExmneRow = mysqli_fetch_assoc($selExmne)) { ?>
                                    <?php 
                                            $exmneId = $selExmneRow['sid'];
                                            $selScore = mysqli_query($conn,"SELECT * FROM exam_question eq INNER JOIN exam_answers ea ON eq.eqt_id = ea.quest_id AND eq.exam_answer = ea.exans_answer  WHERE ea.axmne_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ORDER BY ea.exans_id DESC");

                                              $selAttempt = mysqli_query($conn,"SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$exam_id' ");

                                             $over = $result['ex_questlimit_display']  ;    


                                              $score = mysqli_num_rows($selScore);
                                                $ans = $score / $over * 100;

                                         ?>
                                       <tr style="<?php 
                                             if(mysqli_num_rows($selAttempt) == 0)
                                             {
                                                echo "background-color: #E9ECEE;color:black";
                                             }
                                             else if($ans >= 90)
                                             {
                                                echo "background-color: yellow;";
                                             } 
                                             else if($ans >= 80){
                                                echo "background-color: green;color:white";
                                             }
                                             else if($ans >= 75){
                                                echo "background-color: blue;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: red;color:white";
                                             }
                                           
                                            
                                             ?>"
                                        >
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td>

                                          <?php echo $selExmneRow['FullName']; ?></td>
                                        
                                        <td >
                                        <?php 
                                          if(mysqli_num_rows($selAttempt) == 0)
                                          {
                                            echo "Not answer yet";
                                          }
                                          else if(mysqli_num_rows($selScore) > 0)
                                          {
                                            echo $totScore =  mysqli_num_rows($selScore);
                                            echo " / ";
                                            echo $over;
                                          }
                                          else
                                          {
                                            echo $totScore =  mysqli_num_rows($selScore);
                                            echo " / ";
                                            echo $over;
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if(mysqli_num_rows($selAttempt) == 0)
                                                {
                                                  echo "Not answer yet";
                                                }
                                                else
                                                {
                                                    echo $ans; ?>%<?php
                                                }
                                           
                                          ?>
                                        </td>
                                        <td><?php echo $selExmneRow['class']?></td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>  
                    <?php
                }
 ?>
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
   
    include '../scripts.php';
    ?>
</body>
</html>



