<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
					$del=mysqli_query($conn,"select * from class where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Are you sure to delete from the list?</center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </div>
				
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            $edit=mysqli_query($conn, "SELECT cs.*,concat(co.course,' ',c.level,'-',c.section) as `class`,s.subject as subject ,f.name as fname FROM class_subject cs inner join `class` c on c.id = cs.class_id inner join courses co on co.id = c.course_id inner join faculty f on f.id = cs.faculty_id inner join subjects s on s.id = cs.subject_id where cs.id='".$row['id']."'");
                            $erow=mysqli_fetch_array($edit);
                        ?> 
                        <form role="form" action="edit.php?id=<?php echo $erow['id']; ?> "method="POST">
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <div id="msg" class="form-group"></div>        
                            <div class="form-group text-left">
                                <label for="" class="control-label">Class</label>
                                <select name="class_id" id="" class="custom-select select2">
                                <option value="<?php echo $erow['class_id']?>" hidden><?php echo $erow['class'] ?></option>
                                    <?php
                                    $class = mysqli_query($conn,"SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                    while($row=mysqli_fetch_assoc($class)):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['class'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group text-left">
                                <label for="" class="control-label">Faculty</label>
                                <select name="faculty_id" id="" class="custom-select select2">
                                <option value="<?php echo $erow['faculty_id']?>" hidden><?php echo $erow['fname'] ?></option>
                                    <?php
                                    $class = mysqli_query($conn,"SELECT * FROM faculty order by name asc");
                                    while($row=mysqli_fetch_assoc($class)
                                    ):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($faculty_id) && $faculty_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['name']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group text-left">
                                <label for="" class="control-label">Subject</label>
                                <select name="subject_id" id="" class="custom-select select2">
                                <option value="<?php echo $erow['subject_id']?>" hidden><?php echo $erow['subject'] ?></option>
                                    <?php
                                    $class = mysqli_query($conn,"SELECT * FROM subjects order by subject asc");
                                    while($row=mysqli_fetch_assoc($class)
                                    ):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($subject_id) && $subject_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['subject']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary"> Submit</button>
                                </div>
                        </div>  
                        </form>
                    </div>
            </div>
        </div>
    </div>
<!-- /.modal -->