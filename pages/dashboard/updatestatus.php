
<div class="modal fade" id="status<?php echo $row['ID']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $stats = mysqli_query($conn, "SELECT * FROM attendance where ID ='".$row['ID']."'");
            $row=mysqli_fetch_array($stats);
            ?>
            <div class="modal-body">
                <form role="form" action="editstatus.php?id=<?php echo $row['ID']?>" method="POST"> 
                        <div class="card-body">
                            <div class="form-group">
                            <div class="form-group col-md-12 text-left">
                                    <label for="status">Status </label>
                                    <select class="form-control"
                                            name="status" 
                                            required>
                                            <option value="<?php echo $row['STATUS'] ?>"hidden><?php echo $row['STATUS'] ?></option>
                                            <option value="PRESENT">Present</option>
                                            <option value="LATE">Late</option>
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