<?php
session_start();
ob_start();
include '../head.php';
include '../navbar.php';
include '../config.php';

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
      <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Ranking by exam</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">WELCOME</li>
                        <li class="breadcrumb-item active"><?php echo $_SESSION['faculty']?></li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                  <div>
                      <span class="border" style="background-color: gray;color: yellow; font-size:25px;"><b>Excellence</b></span>
                      <span class="border" style="background-color: gray;color: green; font-size:25px;"><b>Very Good</b></span>
                      <span class="border" style="background-color: gray;color: blue; font-size:25px;"><b>Good</b></span>
                      <span class="border" style="background-color: gray;color: red; font-size:25px;"><b>Failed</b></span>
                      <span class="border" style="background-color: gray;color: #E9ECEE; font-size:25px;"><b>Not Answering</b></span>
                    </div>
              </div>
            </div>
        <div class="col-6 col-md-8">

       <?php 
                $exam_id = $_GET['id'] ?? 0;


                if($exam_id != "")
                {
                   $selEx = mysqli_query($conn, "SELECT * FROM exam WHERE ex_id='$exam_id' ");
                   $result = mysqli_fetch_assoc($selEx);
                   $exam_course = $result['class_id'];
                   

                   $selExmne = mysqli_query($conn,"SELECT s.*, concat(co.course,' ',c.level,'-',c.section) as `class` FROM student_info s 
                   inner join class c on c.id=s.class_id 
                   inner join courses co on co.id=c.course_id   
                   WHERE co.id='$exam_course'  AND s.sid ");
                    
                    
                   ?>

      </div>

              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body table-responsive p-0">
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">

                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                            <tr>
                              <th class="text-center">#</th>
                                    <th width="25%">Examinee Fullname</th>
                                    <th>Score / Over</th>
                                    <th>Percentage</th>
                                    <th>section</th>
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
   include '../footer.php';
    include '../scripts.php';
    exit();
    ?>
</body>
</html>



