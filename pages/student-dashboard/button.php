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


<!-- check status -->
<div class="modal fade" id="view<?php echo $row['ex_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					<h5><center>You want to view your score </center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                <form action="checkStatus.php" method="POST" class="d-inline">
                    <input type="hidden" name="exmneId" value="<?php echo $exmneId; ?>">
                    <input type="hidden" name="examid" value="<?php echo $row['ex_id']; ?>">
                    <button type="submit" name="submit" value="<?php echo $row['ex_id'];?>" class="btn btn-primary btn-sm">Start now</button>
                </form>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->