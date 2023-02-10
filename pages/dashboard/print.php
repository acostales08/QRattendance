
<!DOCTYPE html>
<html lang="en">
<?php
include '../../pages/head.php';
include '../../pages/config.php';
?>
<body onload="window.print();">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between ">
                  <div>
                      <h3 class="card-title"></br>ATTENDANCE SYSTEM  </h3>
                      <h4 class="card-title"></br>Date Printed: <?php echo date("l jS \of F Y h:i:s A"); ?></h4>
                      <h4 class="card-title"></br>Printed by: <b> Arnel Costales</b> - ADMINISTRATOR</h4>
                  </div>
                <div>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card card-outline card-primary">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Attendance Report</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                      <table class="table table-striped">
                          <thead style="font-size:15px">
                                  <tr>
                                  <td>#</td>
                                  <td>Name</td>
                                  <td>Student ID</td>
                                  <td>Time</td>
                                  <td>Date</td>
                                  <td>Status</td>
                                  </tr>
                              </thead>
                              <tbody>
                            <?php
                            $classID = $_GET["id"];
                              $sql ="SELECT * FROM attendance LEFT JOIN student_info ON attendance.StudentID=student_info.StudentID WHERE class_id = $classID";
                              $query = mysqli_query($conn, $sql);
                              $i = 1;
                              while ($row = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['FullName'];?></td>
                                    <td><?php echo $row['StudentID'];?></td>
                                    <td><?php echo $row['TIMEIN'];?></td>
                                    <td><?php echo $row['LOGDATE'];?></td>
                                    <td style="color: blue;"><?php echo $row['STATUS'];?></td>
                                </tr>
                            <?php
                            }
                            ?>
                           </tbody>
                      </table>
                  </div>  
                </div>
              </div>
            </div>
          </div>
        </div>

</body>

</html>

