<div class="modal fade" id="add-class">
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
                        <div class="form-group col-md-12">
                        <input type="hidden" name="id">
							<div id="msg"></div>
							<select name="course_id" id="course_id" class="custom-select select2">
								<option value="" disabled selected hidden>choose course</option>
								<?php 
								$course = $conn->query("SELECT * FROM courses order by course asc");
								while($row=$course->fetch_assoc()):
								?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['course'] ?></option>
							<?php endwhile; ?>
							</select>
							<div class="form-group col-md-12">
								<label class="control-label">Level</label>
								<input type="text" class="form-control" name="level" placeholder="level">
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">Section</label>
								<input type="text" class="form-control" name="section" placeholder="section">
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