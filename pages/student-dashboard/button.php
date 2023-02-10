<?php
if(isset($_SESSION['student'])) :
$exmneId = $_SESSION['sid'];
endif
?>

<div class="modal fade" id="start<?php echo $row['ex_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <h1 class="text-center">Are you sure?</h1>
					<h5><center>You want to take this exam now, your time will start automaticaly </center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                <form action="checkAttempt.php" method="POST" class="d-inline">
                    <input type="hidden" name="exmneId" value="<?php echo $exmneId; ?>">
                    <input type="hidden" name="start" value="<?php echo $row['ex_id']; ?>">
                    <button type="submit" name="exId" value="<?php echo $row['ex_id'];?>" class="btn btn-primary btn-sm">Start now</button>
                </form>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- submit modal -->
<div class="modal fade" id="submit<?php echo $examId ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php
                if(isset($_REQUEST['submit'])){
                    print_r($_REQUEST);
                    }
                
                ?>
            </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <h1 class="text-center">Are you sure?</h1>
					<h5><center>you want to submit your answer now? </center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <form action="submitAnswerExe.php" method="POST" class="d-inline">
                    <input type="hidden" name="exmneId" value="<?php echo $exmneId; ?>">
                    <input type="hidden" name="examId" value="<?php echo $examId; ?>">
                    <button type="submit" name="submit" value="<?php echo $examId;?>" class="btn btn-primary">Yes, submit now</button>
                </form>
                </div>
				
            </div>
        </div>
    </div>
<!-- end submit modal -->