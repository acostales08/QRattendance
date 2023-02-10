<div class="modal fade" id="add-student_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="add_student.php" method="POST"> 
                        <div class="card-body">
                            <div class="row">
                                    <input type="hidden" 
                                            class="form-control" 
                                            name="is_active" 
                                            value = "no"
                                            required>
                                <div class="form-group col-md-12">
                                    <label for="Student Id">Student ID</label>
                                    <input type="text" 
                                            class="form-control" 
                                            id="studentId" 
                                            name="studentId" 
                                            placeholder="Student Id" 
                                            required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Full Name">Full Name</label>
                                    <input type="text" 
                                            class="form-control" 
                                            id="fullName" 
                                            name="fullName" 
                                            placeholder="First Name" 
                                            required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Gender">Gender </label>
                                    <select class="form-control"
                                            name="gender" 
                                            required>
                                            <option disabled selected hidden>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="Email">Email</label>
                                    <input type="Email" 
                                            class="form-control" 
                                            id="email" 
                                            name="email" 
                                            placeholder="Email" 
                                            required>
                                </div>                                

                                
                                <div class="form-group col-md-12">
                                    <label for="" class="control-label">Class</label>
                                    <select name="class_id" id="" class="custom-select select2">
                                        <option value="" disabled selected hidden>please select</option>
                                        <?php
                                        $class = $conn->query("SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                        while($row=$class->fetch_assoc()):
                                        ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['class'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" 
                                            class="form-control" 
                                            name="password" 
                                            placeholder="Password" 
                                            required>
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
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div