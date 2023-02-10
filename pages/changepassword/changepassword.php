<!DOCTYPE html>
<html lang="en">
<?php
include '../head.php';
include '../navbar.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
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
          <a href="#" class="d-block">ADMINISTRATOR</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="../../pages/admin/admin.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/subject/subject.php" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                  Subject
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/course/course.php" class="nav-link">
                <i class="nav-icon fa fa-graduation-cap"></i>
                <p>
                Course
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/class/class.php" class="nav-link">
                <i class="fa fa-users"></i>
                <p>
                Class
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/class_subject/class_subject.php" class="nav-link ">
                <i class="fa fa-tasks"></i>
                <p>
                Class per Subject
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/attendanceReport/attendanceReport.php" class="nav-link">
                <i class="nav-icon fas fa-clock"></i>
                <p>
                  Attendance Report
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/admin/admin.php" class="nav-link">
                <i class="nav-icon far fa-id-card"></i>
                <p>
                  Manage Accounts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../pages/faculty/faculty.php" class="nav-link">
                  <i class="far fas fa-user-tie"></i>
                  <p>Faculty Accounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/student/student.php" class="nav-link">
                   <i class=" fa fa-user-circle"></i>
                  <p>Student Accounts</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-cogs"></i>
                <p>
                  Setting
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/changepassword/changepassword.php" class="nav-link active">
                    <i class="fas fa-user-lock"></i>
                    <p>Chage Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../logout.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                  </a>
                </li>
            </ul>
         </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
   <!-- Content Header (Page header) -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
             <h1 class="m-0"><span style = "color: red; font-size: 35px; width: 2rem;"><b>|</span>Change</b> Password</h1>
        </div>
      </div>
    </div>
  <!-- /.content-header -->
    <?php
    include '../modals.php';
    include '../scripts.php';
    ?>
</body>
</html>