<div class="modal fade" id="add-subject_class">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="add_new.php" method="POST"> 
                    <div class="card-body">
                        <div class="row">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">        
                            <div class="form-group col-md-12">
                                <label for="" class="control-label">Class</label>
                                <select name="class_id" id="" class="custom-select select2">
                                <option value="" disabled selected hidden>please choose class</option>
                                    <?php
                                    $class = $conn->query("SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                    while($row=$class->fetch_assoc()):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['class'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="" class="control-label">Faculty</label>
                                <select name="faculty_id" id="" class="custom-select select2">
                                <option value="" disabled selected hidden>please choose faculty</option>
                                    <?php
                                    $class = $conn->query("SELECT * FROM faculty order by name asc");
                                    while($row=$class->fetch_assoc()):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($faculty_id) && $faculty_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['name']) ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="" class="control-label">Subject</label>
                                <select name="subject_id" id="" class="custom-select select2">
                                <option value="" disabled selected hidden>please choose subject</option>
                                    <?php
                                    $class = $conn->query("SELECT * FROM subjects order by subject asc");
                                    while($row=$class->fetch_assoc()):
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
        </div>  <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>