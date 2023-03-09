<?php
if(isset($_POST['submit'])){
    $class = $_POST['class'];
    $status = $_POST['is_active'];
    $view = $_POST['view'];

    $query =mysqli_query($conn, "UPDATE student_info SET is_active='$status', view='$view' WHERE class_id='$classID'");
    header("location:manage-access.php?id=$class");
    exit();
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
                $class = mysqli_query($conn, "SELECT * FROM student_info order by class_id");
                $row = mysqli_fetch_assoc($class);
                
                ?>
                <form role="form" action="" method="POST"> 
                        <div class="card-body">
                            
                                <div class="form-group col-md-12">
                                    <label for="" class="control-label">Class</label>
                                    <select name="class" id="" class="custom-select select2" required>
                                        <option value="" disabled selected hidden>please select</option>
                                        <?php
                                        $class = mysqli_query($conn, "SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                        while($row=mysqli_fetch_assoc($class)):
                                        ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['class'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <?php
                                $s=mysqli_query($conn, "SELECT * FROM student_info");
                                $srow = mysqli_fetch_assoc($s);
                                ?>
                                <div class="form-group col-md-12">
                                    <label for="is_active">Allow student to login </label>
                                    <select class="form-control"
                                            name="is_active" 
                                            >
                                            <option value="<?php echo $srow['is_active'] ?>" hidden><?php echo $srow['is_active'] ?></option>
                                            <option value="yes">yes</option>
                                            <option value="no">no</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="view">Allow student to view exam result </label>
                                    <select class="form-control"
                                            name="view" 
                                            >
                                            <option value="<?php echo $srow['view'] ?>" hidden><?php echo $srow['view'] ?></option>
                                            <option value="yes">yes</option>
                                            <option value="no">no</option>
                                    </select>
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