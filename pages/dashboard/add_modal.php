
<!-- add modal -->
<div class="modal fade" id="add-exam">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="add_new.php" method="POST" id="form"> 
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                    <label for="course">select course </label>
                                    <select name="course_id" id="course_id" class="custom-select select2">
                                    <option value="" disabled selected hidden>select course</option>
                                        <?php 
                                        $course = $conn->query("SELECT * FROM courses order by course asc");
                                        while($row=$course->fetch_assoc()):
                                        ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['course'] ?></option>
                                    
                                    <?php endwhile; ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Exam Time limit</label>
                                    <select class="form-control" name="examLimit" required="">
                                        <option disabled selected hidden>select time</option>
                                        <option value="10">10 Minutes</option> 
                                        <option value="20">20 Minutes</option> 
                                        <option value="30">30 Minutes</option> 
                                        <option value="40">40 Minutes</option> 
                                        <option value="50">50 Minutes</option> 
                                        <option value="60">60 Minutes</option> 
                                    </select>
                              </div>
                            
                            <div class="form-group col-md-12">
                                <label>Question to display limit</label>
                                <input type="number" name="examQuestDipLimit" class="form-control" placeholder="limit"> 
                              </div>
                            <div class="form-group col-md-12">
                                <label for="level">Exam title </label>
                                <input type="text" 
                                        class="form-control" 
                                        id="title" 
                                        name="title" 
                                        placeholder="title" 
                                        required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="Discription">Discription </label>
                                <input type="text" 
                                        class="form-control" 
                                        id="Discription" 
                                        name="discription" 
                                        placeholder="Discription" 
                                        required>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                </form>
              
            </div>
        </div>  <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- end addModal -->

<!-- Add Question -->
<div class="modal fade" id="add-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="refreshFrm" method="post" action="add_question.php">
                        <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Exam Type</label>
                                    <select class="form-control" name="type" required="">
                                        <option disabled selected hidden>select type</option>
                                        <option value="Identification">Identification</option> 
                                        <option value="Multiple Choice">Multiple Choice</option> 

                                    </select>
                              </div>
                            <div class="form-group">
                                
                                <label>Question</label>
                                <input type="hidden" name="examId" value="<?php echo $exId; ?>">
                                <input type="" name="question" id="course_name" class="form-control" placeholder="Input question" autocomplete="off">
                            </div>

                            <fieldset>
                                <legend>Input word if Multiple Choice</legend>
                                <div class="form-group">
                                    <label>Choice A</label>
                                    <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input choice A " autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Choice B</label>
                                    <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input choice B" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Choice C</label>
                                    <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input choice C" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Choice D</label>
                                    <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input choice D" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input type="" name="correctAnswer" id="" class="form-control" placeholder="Input correct answer" autocomplete="off">
                                </div>
                            </fieldset>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary swalDefaultSuccess">Add Now</button>
                        </div>
                    </form>
            </div>
        </div>  <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end question modal -->

<!-- select time -->

<!-- end select time -->