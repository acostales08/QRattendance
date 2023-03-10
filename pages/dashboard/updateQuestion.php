<!-- Delete -->
<div class="modal fade" id="del<?php echo $selQuestionRow['eqt_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DELETE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                <?php
					$del=mysqli_query($conn, "SELECT * FROM exam_question where eqt_id='".$selQuestionRow['eqt_id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Are you sure to delete from the list?</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delquestion.php?id=<?php echo $selQuestionRow['eqt_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $selQuestionRow['eqt_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">EDIT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
                            $edit=mysqli_query($conn, "SELECT * FROM exam_question where eqt_id='".$selQuestionRow['eqt_id']."'");
                            $erow=mysqli_fetch_array($edit);
                        ?> 
                <form role="form" action="editexam.php?id=<?php echo $selQuestionRow['eqt_id']; ?> "method="POST"> 
                <div class="modal-body">
                            <div class="col-md-12">
                            <div class="form-group">
                                
                                <label>Question</label>
                                <input type="hidden" name="examId" value="<?php echo $exId; ?>">
                                <input type="" name="question" id="course_name" class="form-control" value="<?php echo $selQuestionRow['exam_question']; ?>">
                            </div>
                            <fieldset>
                                <legend>Input word for choice's</legend>
                                <div class="form-group">
                                    <label>Choice A</label>
                                    <input type="" name="choice_A" id="choice_A" class="form-control" value="<?php echo $selQuestionRow['exam_ch1']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Choice B</label>
                                    <input type="" name="choice_B" id="choice_B" class="form-control" value="<?php echo $selQuestionRow['exam_ch2']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Choice C</label>
                                    <input type="" name="choice_C" id="choice_C" class="form-control" value="<?php echo $selQuestionRow['exam_ch3']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Choice D</label>
                                    <input type="" name="choice_D" id="choice_D" class="form-control" value="<?php echo $selQuestionRow['exam_ch4']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input type="" name="correctAnswer" id="" class="form-control" value="<?php echo $selQuestionRow['exam_answer']; ?>">
                                </div>
                            </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" >Submit</button>
                            </div>
                </form>
                    </div>
            </div>
        </div>
    </div>
<!-- /.modal -->