<div class="modal fade" id="addfaculty">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Faculty</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form role="form" action="add_new.php" method="POST"> 
                    <div class="card-body">
                        <div class="row">
                             <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                                <div id="msg" class="form-group col-md-12"</div>
                                <div class="form-group">
                                    <label for="" class="control-label">ID #</label>
                                    <input type="text" class="form-control" name="id_no" placeholder="ID no."   required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Full Name"  required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email"  required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Contact</label>
                                    <input type="text" class="form-control" name="contact"placeholder="Contact" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" 
                                            class="form-control" 
                                            id="password" 
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
        </div>  <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>