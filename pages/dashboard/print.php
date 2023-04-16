<?php
include '../head.php';
include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<body onload="window.print();">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card card-outline card-primary">
                <div class="card-body">
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                  <div class="card-header">
                  <?php
                    $class_subject = $_GET["class_subject"];
                    $date = $_GET['date'];
                    $class1 = mysqli_query($conn, "SELECT cs.*,concat(c.level,'-',c.section) as `class`,s.subject, co.course, f.name as fname FROM class_subject cs inner join `class` c on c.id = cs.class_id 
                    inner join courses co on co.id = c.course_id 
                    inner join faculty f on f.id = cs.faculty_id 
                    inner join subjects s on s.id = cs.subject_id 
                    where cs.id = '$class_subject'");
                    $erow = mysqli_fetch_assoc($class1);
                    $course = $erow['course'] ?? "--";
                    $class = $erow['class'] ?? "--";
                    $subject = $erow['subject'] ?? "--";
                    $faculty = $erow['fname'] ?? "--";
                    ?>
                    <div>
                      <p><b style="color: rgba(128,0,128,0.8)"> ATTENDANCE SYSTEM  </p> </b>
                         <p>Date Printed: <b style="color: rgba(128,0,128,0.8)"> <?php echo date("l jS \of F Y h:i:s A"); ?></p></b>
                         <p>Printed by: <b style="color: rgba(128,0,128,0.8)"> <?php echo $faculty; ?></b></p>
                        </div>
                          

                    <table width="100%">
                      <tr>
                        <td width="50%">
                          <p>Course: <b style="color: rgba(128,0,128,0.8)"> <?php echo $course; ?></b></p>
                          <p>Subject: <b style="color: rgba(128,0,128,0.8)"> <?php echo $subject; ?></b></p>
                        </td>
                        <td width="50%">
                          <p>Class: <b style="color: rgba(128,0,128,0.8)"> <?php echo $class; ?></b></p>
                          <p>Date of Class: <b style="color: #007bff;"> <?php echo $date; ?></b></p>
                        </td>
                      </tr>
                    </table>
                    </div>
                      <table class="table table-striped">
                          <thead style="font-size:15px">
                                  <tr>
                                  <td>#</td>
                                  <td>Student ID</td>
                                  <td>Name</td>
                                  <td>Time</td>
                                  <td>Date</td>
                                  <td>Status</td>
                                  </tr>
                              </thead>
                              <tbody>
                            <?php
                            
                              $sql ="SELECT * FROM attendance LEFT JOIN student_info ON attendance.StudentID=student_info.StudentID WHERE class_subject_id = $class_subject AND LOGDATE = '$date'";
                              $query = mysqli_query($conn, $sql);
                              $i = 1;
                              while ($row = mysqli_fetch_assoc($query)){
                            ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $row['StudentID'];?></td>
                                    <td><?php echo $row['FullName'];?></td>
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

