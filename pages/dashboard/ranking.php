<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../navbar.php';
include '../config.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div> -->
<div class="container-scroller">
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
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
          <a href="../../pages/profile/profile.php" class="d-block">Isaiah James B. Gonzales</a>
        </div>
      </div>
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 15px;">TEACHER</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <?php include '../dashboard/sidebar.php'; ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="main-panel">
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
              <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>Ranking by exam </b></h1>
          </div>
       </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card card-outline card-primary">
                  <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Exam</p>
                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <?php

                        $sql = "SELECT * FROM exam JOIN courses on exam.cou_id = courses.id";
                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                        ?>

                        <table id="example1" class="table table-striped" >
                            <thead style="font-size:15px">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Exam title</th>
                                    <th class="text-center">Course</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;
                                while($row = mysqli_fetch_assoc($result)){
                              ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++?></td>
                                                <td class="text-center"><?= $row['ex_title']; ?></td>
                                                <td class="text-center"><?= $row['course']; ?></td>
                                                <td class="text-center"><?= $row['ex_description']; ?></td>
                                                <td class="project-actions text-center">
                                                    <a class="btn btn-primary btn-sm" href="viewRanking.php?id=<?php echo $row['ex_id']; ?>">
                                                      <i class="fas fa-folder">
                                                        </i>
                                                        View
                                                    </a>
                                                </td>

                                            </tr>
                                            <?php } ?>
                            </tbody>
                        </table>
                    </div>  
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- partial -->
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
    <?php
   
    include '../scripts.php';
    ?>
</body>
</html>



