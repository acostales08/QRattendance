<?php 
ob_start();
session_start();
include '../head.php';
include '../navbar.php';
include '../config.php';

?>
<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini layout-fixed">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../../dist/img/logo.png" alt="RCILogo" height="100" width="80">
</div>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="../../dist/img/logo.png" alt="RCI Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Richwell Colleges Inc.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel ">
        <div class="info">
          <a class="d-block" style="font-size: 25px; margin: 0 50px;">TEACHER</a>
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
              <div class="container-fluid">
                <div class="row lg-2">
                    <div class="col-sm-3">
                    <h1 class="m-0"><span style = "color: purple; font-size: 40px; width: 2rem;"><b>|</span>Attendance Report</b></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                      <form role="form" action="class_att_re.php" method="POST">                 
                                      <div class="form-group col-md-12">
                                          <select name="class" id="" class="custom-select select2" onchange="this.form.submit()" required>
                                              <option value="" disabled selected hidden>please select class per subject</option>
                                              <?php
                                              $faculty = $_SESSION['id'];
                                              $class = mysqli_query($conn, "SELECT cs.*,concat(co.course,' ',c.level,'-',c.section) as `class`,s.subject,f.name as fname FROM class_subject cs inner join `class` c on c.id = cs.class_id 
                                              inner join courses co on co.id = c.course_id 
                                              inner join faculty f on f.id = cs.faculty_id 
                                              inner join subjects s on s.id = cs.subject_id ".($_SESSION['id'] ? " 
                                              where f.id = {$_SESSION['id']} ":"")." order by concat(co.course,' ',c.level,'-',c.section) asc");
                                              while($row=mysqli_fetch_assoc($class)):
                                              ?>
                                              <option value="<?php echo $row['id'] ?>" data-cid="<?php echo $row['id'] ?>" <?php echo isset($class_subject_id) && $class_subject_id == $row['id'] ? 'selected' : (isset($class_subject_id) && $class_subject_id == $row['id'] ? 'selected' :'') ?>><?php echo $row['class'].' '.$row['subject'] ?></option>
                                              <?php endwhile; ?>
                                          </select>
                                      </div>    
                                      
                      </form>
                      </div>
                    <div class="col-sm-3">
                      <?php
                      if(isset($_POST['submit'])){
                        $selectdate = $_POST['date'] ;
                      }
                      ?>
                      <form action="" method="POST">
                       <div class="input-group mb-3">
                        <input type="date" name="date" value="<?php echo date('Y-m-d')?>" class="form-control">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" name="submit" type="submit">Go</button>
                        </div>
                      </div>
                      </form>

                    </div><!-- /.col -->
                    <div class="col-sm-3">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">WELCOME</li>
                        <li class="breadcrumb-item active"><?php echo $_SESSION['faculty']?></li>
                      </ol>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
              </div>
            </div>
            <!-- /.content-header -->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>

                    <?php $class_subject = $_GET["id"] ?? 0;
                    date_default_timezone_set('Asia/Manila');
                           $date = $selectdate ?? date('Y-m-d');?>
                      <a href="print.php?class_subject=<?php echo $class_subject ?> & date=<?php echo $date?>" target="_blank"><button type="button" class="btn btn-md btn-outline-success edit_class_subject" > <i class="ti-printer btn-icon-prepend"> </i>Print</button></a>
                  </div>
                <div>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card card-outline card-primary">
                <?php include '../message.php';?>
              <?php

                    $class1 = mysqli_query($conn, "SELECT cs.*,concat(c.level,'-',c.section) as `class`,s.subject, co.course, f.name as fname FROM class_subject cs inner join `class` c on c.id = cs.class_id 
                    inner join courses co on co.id = c.course_id 
                    inner join faculty f on f.id = cs.faculty_id 
                    inner join subjects s on s.id = cs.subject_id 
                    where cs.id = '$class_subject'");
                    $erow = mysqli_fetch_assoc($class1);
                    $course = $erow['course'] ?? "--";
                    $class = $erow['class'] ?? "--";
                    $subject = $erow['subject'] ?? "--";
                    ?>
                <div class="card-body table-responsive p-0">
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <div class="card-header">
                    <table width="100%">
                      <tr>
                        <td width="50%">
                          <p>Course: <b style="color: #007bff;"> <?php echo $course; ?></b></p>
                          <p>Subject: <b style="color: #007bff;"> <?php echo $subject; ?></b></p>
                        </td>
                        <td width="50%">
                          <p>Class: <b style="color: #007bff;"> <?php echo $class; ?></b></p>
                          <p>Date of Class: <b style="color: #007bff;"> <?php echo $date; ?></b></p>
                        </td>
                      </tr>
                    </table>
                    </div>
                      <table id="example1" class="table table-striped">
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
                         
                           $i = 1;
                           $sql ="SELECT * FROM attendance inner JOIN student_info ON attendance.StudentID=student_info.StudentID WHERE class_subject_id = '$class_subject' AND LOGDATE= '$date' order by attendance.LOGDATE desc";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $row['StudentID'];?></td>
                                <td><?php echo $row['FullName'];?></td>
                                <td><?php echo $row['TIMEIN'];?></td>
                                <td><?php echo $row['LOGDATE'];?></td>
                                <td style="color: #007bff;"><?php echo $row['STATUS'];?></td>
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
  <?php
  include '../footer.php';
    include '../scripts.php';
    exit();
    ?>
</body>
</html>