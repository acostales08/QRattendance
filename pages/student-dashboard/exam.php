<?php 
session_start();
ob_start();
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
                    $exmne_id = $_SESSION['sid'];

                      if(isset($_REQUEST['submit'])){
                        $exam_id = $_REQUEST['exam_id'];
                        $selExAttempt = mysqli_query($conn, "SELECT * FROM exam_attempt WHERE exmne_id='$exmne_id' AND exam_id='$exam_id'  ");

                        $selAns = mysqli_query($conn,"SELECT * FROM exam_answers WHERE axmne_id='$exmne_id' AND exam_id='$exam_id' ");
                            if(mysqli_num_rows($selExAttempt) > 0)
                            {                  
                                exit(0);
                            }
                            
                        else
                        {
                        
                           foreach ($_REQUEST['answer'] as $key => $value) {
                               $value = $value['correct'];
                                 $insAns = mysqli_query($conn,"INSERT INTO exam_answers(axmne_id,exam_id,quest_id,exans_answer) VALUES('$exmne_id','$exam_id','$key','$value')");
                                 
                                }
                                
                            if($insAns)
                            {
                               $insAttempt = mysqli_query($conn,"INSERT INTO exam_attempt(exmne_id,exam_id)  VALUES('$exmne_id','$exam_id') ");
                               
                               if($insAttempt)
                               {
                                
                                header("location:taken.php");
                                ob_end_flush();
                                die();
                               }
                               else
                               {
                                $_SESSION['message'] = "you already take this exam";
                                
                                exit(0);
                               }
                            }                  
                           
                        }
                                                  
                      }
?>
        <?php 
            $examId = $_GET['id'];
            $selExam = mysqli_query($conn, "SELECT * FROM exam WHERE ex_id='$examId' ");
            $result = mysqli_fetch_assoc($selExam);
            $selExamTimeLimit = $result['ex_time_limit'];
            $exDisplayLimit = $result['ex_questlimit_display'];

        ?>
<div class="main-panel">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span><?php echo $result['ex_title']; ?>  </b><?php echo $result['ex_description']; ?></h1>
                </div>
            </div>
             <div class="page-title-actions mr-5" style="font-size: 20px;">      
                <form name="cd">
                    <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                        <label>Remaining Time : </label>
                    <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />

                      
              <form method="post" action="viewTaken.php?id=$examId " id="form">
            <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
            <input type="hidden" name="examAction" id="examAction" >
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
        <?php 
            $selQuest = mysqli_query($conn, "SELECT * FROM exam_question WHERE exam_id='$examId' ORDER BY q_type, rand() LIMIT $exDisplayLimit ");
            if(mysqli_num_rows($selQuest) > 0)
            {
                $i = 1;
                while ($selQuestRow = mysqli_fetch_assoc($selQuest)) { ?>
                      <?php $questId = $selQuestRow['eqt_id']; ?>
                      <?php if($selQuestRow['q_type'] == "Identification"){?>
                        <tr>
                          <td>
                            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow['exam_question']; ?></b></p>
                              <div class="col-md-4 float-left">
                                    <div class="form-group pl-4 ">
                                      <input name="answer[<?php echo $questId; ?>][correct]" 
                                      class="form-control" 
                                      type="text" 
                                      value=""
                                      placeholder="Answer here"
                                      autocomplete="off"
                                       >
                            </div>
                          </td>
                        </tr>
                        
                    <?php } elseif($selQuestRow['q_type'] == "Multiple Choice") {?>
                      <tr>
                        <td>
                            <p><b><?php echo $i++ ; ?> .) <?php echo $selQuestRow['exam_question']; ?></b></p>
                            <div class="col-md-4 float-left">
                              <div class="form-group pl-4 ">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck"  >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['exam_ch1']; ?>
                                </label>
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck"  >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['exam_ch2']; ?>
                                </label>
                              </div>   
                            </div>
                            <div class="col-md-8 float-left">
                             <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck"  >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['exam_ch3']; ?>
                                </label>
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck"  >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $selQuestRow['exam_ch4']; ?>
                                </label>
                              </div>   
                            </div>
                            </div>
                             

                        </td>
                    </tr>

                 <?php   } else {?>
                    <b>No question at this moment</b>
               <?php  }?>

                    
                <?php }
                ?>
                       <tr>
                       <td style="padding: 20px;">
                             
                                 <input name="submit" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right btn btn-success swalDefaultSuccess"  id="submit">
                                 
                                 
                             </td>
                         </tr>

                <?php
            }
            else
            { ?>
                <b>No question at this moment</b>
            <?php }
         ?>   
              </table>

        </form>

            </div>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
  <!-- /.control-sidebar -->
</div>
<script>
  var mins
var secs;

function cd() {
  var timeExamLimit = $('#timeExamLimit').val();
  mins = 1 * m("" + timeExamLimit); // change minutes here
  secs = 0 + s(":01"); 
  redo();
}

function m(obj) {
  for(var i = 0; i < obj.length; i++) {
      if(obj.substring(i, i + 1) == ":")
      break;
  }
  return(obj.substring(0, i));
}

function s(obj) {
  for(var i = 0; i < obj.length; i++) {
      if(obj.substring(i, i + 1) == ":")
      break;
  }
  return(obj.substring(i + 1, obj.length));
}

function dis(mins,secs) {
  var disp;
  if(mins <= 9) {
      disp = " 0";
  } else {
      disp = " ";
  }
  disp += mins + ":";
  if(secs <= 9) {
      disp += "0" + secs;
  } else {
      disp += secs;
  }
  return(disp);
}

function redo() {
  secs--;
  if(secs == -1) {
      secs = 59;
      mins--;
  }
  document.cd.disp.value = dis(mins,secs); 
  if((mins == 0) && (secs == 0)) {
    $('#examAction').val("autoSubmit");
     $('#submit').click();
  } else {
    cd = setTimeout("redo()",1000);
  }
}

function init() {
  cd();
}

window.onload = init;


</script>


<!-- ./wrapper -->
<?php
include '../footer.php';
include '../scripts.php';
exit();
?>
</body>
</html>
