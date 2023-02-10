<?php 

session_start();

if (!isset($_SESSION['faculty'])) {
    header("Location: ../../pages/login/login2.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../navbar.php';
include '../config.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../pages/admin/admin.php" class="brand-link">
      <img src="../../dist/img/logo.png" alt="RCI Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Richwell Colleges Inc.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="../../pages/profile/profile.php" class="d-block"><?php echo $_SESSION['faculty']?></a>
        </div>
      </div>
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 15px;">TEACHER</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
<?php include 'sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user.jpg"
                       alt="User profile picture">
                </div>
                <?php
                $id = $_SESSION['id'];
                $sql = mysqli_query($conn, "SELECT * FROM faculty where id = '$id'");
                $row = mysqli_fetch_assoc($sql);
                    ?>
                <h3 class="profile-username text-center"> <?php echo $row['name']?></h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name: </b> <b class=" text-muted float-center">  <?php echo $row['name']?></b>
                  </li>
                  <li class="list-group-item">
                    <b>Email: </b> <b class=" text-muted float-center">  <?php echo $row['email']?></b>
                  </li>
                  <li class="list-group-item">
                    <b>Contact: </b> <b class=" text-muted float-center">  <?php echo $row['contact']?></b>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">

                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Profile</a></li>

                </ul>
              </div><!-- /.card-header -->


                  <div class="tab-pane" id="settings">
                  <form method="POST" action="editprofile.php?=id<?php echo $row['id']?>">
                    <div class="card-body">
                       <div class="form-group">
                                    <label for="" class="control-label">ID #</label>
                                    <input type="text" class="form-control" name="id_no" value="<?php echo $row['id_no']?>"   required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name']?>"  required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Contact</label>
                                    <input type="text" class="form-control" name="contact"value="<?php echo $row['contact']?>" >
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-group col-md-12">Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $row['address']?>" >
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password">Password</label>
                                    <input type="password" 
                                            class="form-control" 
                                            id="password" 
                                            name="password" 
                                            value="<?php echo $row['Password']?>" 
                                            required>
                                </div> 
                                <div class="form-group">
                                <label for="custom">File input</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                         <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                </div>

                                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <script>
$(function () {
  bsCustomFileInput.init();
});
</script>


    <?php
include '../scripts.php';
?>
</body>
</html>