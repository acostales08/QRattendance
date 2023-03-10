<div class="modal fade" id="add-course">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Course</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="add_new.php" method="POST"> 
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="Course Name">Course</label>
                                <input type="text" class="form-control" 
                                        id="Subject Name" name="Coursename" placeholder="Course Name" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description">description </label>
                                <input type="text" 
                                        class="form-control" 
                                        id="description Name" 
                                        name="description" 
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
        </div>  <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>