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
					$del=mysqli_query($conn,"select * from courses where id='".$row['id']."'");
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
                            $edit=mysqli_query($conn,"select * from courses where id='".$row['id']."'");
                            $erow=mysqli_fetch_array($edit);
                        ?> 
                <form role="form" action="edit.php?id=<?php echo $erow['id']; ?> "method="POST"> 
                    <div class="card-body">
                    <div class="row">

                            <div class="form-group col-md-12 text-left">
                                <label for="Course">Course</label>
                                <input type="text" 
                                        class="form-control" 
                                        id="Course" 
                                        name="Course" 
                                        value="<?php echo $erow['course']; ?>"
                                        placeholder="Course"
                                        required>
                            </div>
                            <div class="form-group col-md-12 text-left">
                                <label for="description">description </label>
                                <input type="text" 
                                        class="form-control" 
                                        id="description Name" 
                                        name="description" 
                                        value="<?php echo $erow['description']; ?>"
                                        placeholder="description" 
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
        </div>
    </div>
<!-- /.modal -->