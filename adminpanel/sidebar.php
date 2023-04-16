<?php
       $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1 ) ;
      
      ?>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="../../adminpanel/admin/admin.php" class="nav-link <?= $page == 'admin.php' ? 'active': ' ' ?>" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../adminpanel/subject/subject.php" class="nav-link <?= $page == 'subject.php' ? 'active': ' ' ?>">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                  Subject
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../adminpanel/course/course.php" class="nav-link <?= $page == 'course.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-graduation-cap"></i>
                <p>
                Course
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../adminpanel/class/class.php" class="nav-link <?= $page == 'class.php' ? 'active': ' ' ?>">
                <i class="fa fa-users"></i>
                <p>
                Class
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../adminpanel/class_subject/class_subject.php" class="nav-link <?= $page == 'class_subject.php' ? 'active': ' ' ?>">
                <i class="fa fa-tasks"></i>
                <p>
                Class per Subject
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../adminpanel/attendanceReport/attendanceReport.php" class="nav-link <?= $page == 'attendanceReport.php' ? 'active': ' ' ?>">
                <i class="nav-icon fas fa-clock"></i>
                <p>
                  Attendance Report
                </p>
              </a>
            </li>
            <li class="nav-item <?= $page == 'faculty.php' || $page == 'student.php' ? 'menu-open': ' ' ?>" >
              <a href="#" class="nav-link <?= $page == 'faculty.php' || $page == 'student.php' ? 'active': ' ' ?>">
                <i class="nav-icon far fa-id-card"></i>
                <p>
                  Manage Accounts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../adminpanel/faculty/faculty.php" class="nav-link <?= $page == 'faculty.php' ? 'active': ' ' ?>">
                  <i class="far fas fa-user-tie"></i>
                  <p>Faculty Accounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../adminpanel/student/student.php" class="nav-link <?= $page == 'student.php' ? 'active': ' ' ?>">
                   <i class=" fa fa-user-circle"></i>
                  <p>Student Accounts</p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item <?= $page == 'changepassword.php' ? 'menu-open': ' ' ?>">
              <a href="#" class="nav-link">
                <i class="fas fa-cogs"></i>
                <p>
                  Setting
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../adminpanel/admin/changepassword.php" class="nav-link <?= $page == 'changepassword.php' ? 'active': ' ' ?>">
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