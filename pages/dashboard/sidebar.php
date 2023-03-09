<?php

       $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1 ) ;
      
      ?>
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="dashboard.php" class="nav-link <?= $page == 'dashboard.php' ? 'active': ' ' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="class.php" class="nav-link <?= $page == 'class.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Class
                </p>
              </a>
            </li>
             <li class="nav-item">
              <a href="scan_attendance.php" class="nav-link <?= $page == 'scan_attendance.php' ? 'active': ' ' ?>">
                <i class="nav-icon fas fa-clock"></i>
                <p>
                  Attendance Monitoring
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="attendance_report.php?id=0" class="nav-link <?= $page == 'attendance_report.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-calendar-check"></i>
                <p>
                  Attendance Report
                </p>
              </a>
            </li>
             <li class="nav-item">
              <a href="exam.php" class="nav-link <?= $page == 'exam.php' || $page == 'manage-exam.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-archive"></i>
                <p>
                  Manage Exam
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="ranking.php" class="nav-link <?= $page == 'ranking.php' || $page == 'viewRanking.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-certificate"></i>
                <p>
                  Ranking by exam
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="examresult.php" class="nav-link <?= $page == 'examresult.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-folder"></i>
                <p>
                  Exam report
                </p>
              </a>
            </li>
            <li class="nav-item <?= $page == 'changepassword.php' ? 'menu-open': ' ' ?>"">
              <a href="#" class="nav-link">
                <i class="fas fa-cogs"></i>
                <p>
                  Setting
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="changepassword.php" class="nav-link <?= $page == 'changepassword.php' ? 'active': ' ' ?>">
                    <i class="fas fa-user-lock"></i>
                    <p>Chage Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="logout.php" class="nav-link <?= $page == 'login.php' ? 'active': ' ' ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                  </a>
                </li>
            </ul>
            </li>
      </nav>