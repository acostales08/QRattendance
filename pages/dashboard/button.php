<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['ex_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DELETE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
				<div class="container-fluid">
					<h5><center>Are you sure to delete from the list?</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?id=<?php echo $row['ex_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash "></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['ex_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDIT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM exam where ex_id='".$row['ex_id']."'");
                    $erow= mysqli_fetch_assoc($query);
                    ?>

                <form role="form" action="edit.php?id=<?php echo $row['ex_id']; ?>" method="POST" id="form"> 
                    <div class="card-body">
                        <div class="row">
                        <div class="form-group col-md-12 text-left">
                                    <label for="" class="control-label">Class</label>
                                    <select name="class_id" id="" class="custom-select select2">
                                    <option value="<?php echo $row['class_id']?>" hidden><?php echo $row['class'] ?></option>
                                        <?php
                                        $class = $conn->query("SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                        while($row=$class->fetch_assoc()):
                                        ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['class'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            <div class="form-group col-md-12 text-left">
                                <label>Exam Time limit</label>
                                    <select class="form-control" name="examLimit" required="">
                                        <option value="<?php echo $erow['ex_time_limit']; ?>" hidden><?php echo $erow['ex_time_limit']; ?></option>
                                        <option value="10">10 Minutes</option> 
                                        <option value="20">20 Minutes</option> 
                                        <option value="30">30 Minutes</option> 
                                        <option value="40">40 Minutes</option> 
                                        <option value="50">50 Minutes</option> 
                                        <option value="60">60 Minutes</option> 
                                    </select>
                              </div>
                            
                            <div class="form-group col-md-12 text-left">
                                <label>Question to display limit</label>
                                <input type="number" name="examQuestDipLimit" class="form-control" value="<?php echo $erow['ex_questlimit_display']; ?>" > 
                              </div>
                            <div class="form-group col-md-12 text-left">
                                <label for="level">Exam title </label>
                                <input type="text" 
                                        class="form-control" 
                                        name="title" 
                                        value="<?php echo $erow['ex_title']; ?>"
                                        required>
                            </div>
                            <div class="form-group col-md-12 text-left">
                                <label for="Discription">Discription </label>
                                <input type="text" 
                                        class="form-control" 
                                        id="Discription" 
                                        name="discription" 
                                        value="<?php echo $erow['ex_description']; ?>"
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

<!-- /.modal -->

