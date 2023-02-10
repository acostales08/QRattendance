<div class="modal fade" id="edit<?php echo $row['sid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                            $edit=mysqli_query($conn,"SELECT s.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM student_info s inner join `class` c on c.id = s.class_id inner join courses co on co.id = c.course_id where s.sid ='".$row['sid']."'");
                            $erow=mysqli_fetch_array($edit);

                        ?> 
                <form role="form" action="updatestudent.php?id=<?php echo $erow['sid']; ?>"method="POST"> 
                <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 text-left">
                                    <label for="Student Id">Student ID</label>
                                    <input type="text" 
                                            class="form-control" 
                                            id="studentId" 
                                            name="studentId" 
                                            value="<?php echo $erow['StudentID'] ?>"
                                            required>
                                </div>
                                <div class="form-group col-md-12 text-left">
                                    <label for="Full Name">Full Name</label>
                                    <input type="text" 
                                            class="form-control" 
                                            id="fullName" 
                                            name="fullName" 
                                            value="<?php echo $erow['FullName'] ?>" 
                                            required>
                                </div>
                                <div class="form-group col-md-12 text-left">
                                    <label for="Gender">Gender </label>
                                    <select class="form-control"
                                            name="gender" 
                                            required>
                                            <option value="<?php echo $row['Gender'] ?>"hidden><?php echo $row['Gender'] ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12 text-left">
                                    <label for="Email">Email</label>
                                    <input type="text" 
                                            class="form-control" 
                                            id="email" 
                                            name="email" 
                                            value="<?php echo $erow['Email'] ?>" 
                                            required>
                                </div>                                

                                
                                <div class="form-group col-md-12 text-left">

                                    <label for="" class="control-label">Class</label>
                                    <select name="class_id" id="" class="custom-select select2">
                                    <option value="<?php echo $erow['class_id']?>" ><?php echo $erow['class'] ?></option>
                                    <?php
                                    $class = $conn->query("SELECT c.*,concat(co.course,' ',c.level,'-',c.section) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.course,' ',c.level,'-',c.section) asc");
                                    while($row=$class->fetch_assoc()):
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['class'] ?></option>
                                    <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="">
                                    <label for="password"></label>
                                    <input type="hidden" 
                                            class="form-control" 
                                            id="password" 
                                            name="password" 
                                            value="<?php echo $erow['Password'] ?>" 
                                            required>
                                </div> 
                                <div class="form-group col-md-12 text-left">
                                    <label for="is_active">is_active </label>
                                    <select class="form-control"
                                            name="is_active" 
                                            required>
                                            <option value="<?php echo $erow['is_active'] ?>" hidden><?php echo $erow['is_active'] ?></option>
                                            <option value="yes">yes</option>
                                            <option value="no">no</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 text-left">
                                    <label for="view">view exam </label>
                                    <select class="form-control"
                                            name="view" 
                                            required>
                                            <option value="<?php echo $erow['is_active'] ?>" hidden><?php echo $erow['is_active'] ?></option>
                                            <option value="yes">yes</option>
                                            <option value="no">no</option>
                                    </select>
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
        </div>
    </div>