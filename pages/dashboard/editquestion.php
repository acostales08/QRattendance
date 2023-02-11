<!-- edit question -->
<div class="modal fade" id="edit<?php echo $selQuestionRow['eqt_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $exam = mysqli_query($conn, "SELECT * FROM exam_question where eqt_id ='".$selQuestionRow['eqt_id']."'");
                    $erow=mysqli_fetch_array($exam);
                    ?>
                    <form class="refreshFrm" method="post" action="eq.php?id=<?php echo $erow['eqt_id']; ?>">
                        <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <label>Exam Type</label>
                                    <select class="form-control" name="type" required="">
                                        <option value="<?php echo $selQuestionRow['q_type']; ?>"><?php echo $selQuestionRow['q_type']; ?></option>
                                        <option value="Identification">Identification </option> 
                                        <option value="Multiple Choice">Multiple Choice</option> 

                                    </select>
                              </div>
                            <div class="form-group text-left">
                                
                                <label>Question</label>
                                <input type="hidden" name="examId" value="<?php echo $selQuestionRow['exam_id']; ?>">
                                <input type="text" name="question" id="course_name" class="form-control" value="<?php echo $selQuestionRow['exam_question']; ?>" autocomplete="off">
                            </div>

                            <fieldset>
                                <legend class="text-left">Input word if Multiple Choice</legend>
                                <div class="form-group text-left">
                                    <label>Choice A</label>
                                    <input type="text" name="choice_A" id="choice_A" class="form-control" value="<?php echo $selQuestionRow['exam_ch1']; ?>" autocomplete="off">
                                </div>

                                <div class="form-group text-left">
                                    <label>Choice B</label>
                                    <input type="text" name="choice_B" id="choice_B" class="form-control" value="<?php echo $selQuestionRow['exam_ch2']; ?>" autocomplete="off">
                                </div>

                                <div class="form-group text-left">
                                    <label>Choice C</label>
                                    <input type="text" name="choice_C" id="choice_C" class="form-control" value="<?php echo $selQuestionRow['exam_ch3']; ?>" autocomplete="off">
                                </div>

                                <div class="form-group text-left">
                                    <label>Choice D</label>
                                    <input type="text" name="choice_D" id="choice_D" class="form-control" value="<?php echo $selQuestionRow['exam_ch4']; ?>" autocomplete="off">
                                </div>

                                <div class="form-group text-left">
                                    <label>Correct Answer</label>
                                    <input type="text" name="correctAnswer" id="" class="form-control" value="<?php echo $selQuestionRow['exam_answer']; ?>" autocomplete="off">
                                </div>
                            </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary swalDefaultSuccess">Update Now</button>
                        </div>
                    </form>
            </div>
        </div>  <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end edit quwstion -->