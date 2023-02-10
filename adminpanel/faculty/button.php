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
					$del=mysqli_query($conn,"select * from faculty where id='".$row['id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Are you sure to delete <strong><?php echo ucwords($drow['id_no'].'</strong>'.' '.'<u>'.$row['name']).'</u>'; ?> from the list? This method cannot be undone.</center></h5> 
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
                            $edit=mysqli_query($conn,"select * from faculty where id='".$row['id']."'");
                            $erow=mysqli_fetch_array($edit);
                        ?> 
                            <form role="form" action="edit.php?id=<?php echo $erow['id']; ?> "method="POST"> 
                                <div class="card-body">
                                       <div class="row">
                                            <input type="hidden"
                                             name="id"
                                              value="<?php echo isset($id) ? $id : '' ?>">
                                                <div id="msg" class="form-group col-md-12 text-left"</div>
                                                <div class="form-group">
                                                    <label for="" class="control-label">ID #</label>
                                                    <input type="text" class="form-control" name="id_no" value="<?php echo $erow['id_no'] ?>"   required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-group col-md-12 text-left">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?php echo $erow['name'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-group col-md-12 text-left">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?php echo $erow['email'] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-group col-md-12 text-left">Contact</label>
                                                    <input type="text" class="form-control" name="contact"value="<?php echo $erow['contact'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-group col-md-12 text-left">Address</label>
                                                    <input type="text" class="form-control" name="Address" value="<?php echo $erow['address'] ?>">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="password">Password</label>
                                                    <input type="password" 
                                                            class="form-control" 
                                                            id="password" 
                                                            name="password" 
                                                            value="<?php echo $erow['Password'] ?>"
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