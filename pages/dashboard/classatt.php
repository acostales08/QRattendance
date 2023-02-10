<?php
if(isset($_POST['submit'])){
    $class = $_POST['class'];
    $sid = $_POST['student_id'];
    if($class == $class){
        header("location:attendance_report.php?id=$class");
    }else{
        header("location:attendance_report.php?id=$sid");
    }

    
}

?>


<div class="modal fade" id="select">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php

                include '../config.php';
                $class = mysqli_query($conn, "SELECT * FROM class_subject order by id");
                $row = mysqli_fetch_assoc($class);
                
                ?>
                <form role="form" action="" method="POST"> 
                        <div class="card-body">
                                <input type="hidden" 
                                        class="form-control" 
                                        name="class_id" 
                                        value = "<?php echo $row['id'] ?>"
                                        required>                               
                                <div class="form-group col-md-12">
                                    <label for="" class="control-label">Class</label>
                                    <select name="class" id="" class="custom-select select2">
                                        <option value="" disabled selected hidden>please select</option>
                                        <?php
                                        $class = $conn->query("SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                        while($row=$class->fetch_assoc()):
                                        ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['class'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 text-left">
                                <label for="student id">Student ID </label>
                                <input type="text" 
                                        class="form-control" 
                                        name="student_id" 
                                        placeholder="student ID"
                                        >
                            </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary" name="submit"> Submit</button>
                                </div>
                        </div>       
                </form>
            </div>
        </div>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div