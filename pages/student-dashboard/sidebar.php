<?php

       $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1 ) ;
      
      ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="student.php" class="nav-link <?= $page == 'student.php' || $page == 'exam.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-braille"></i>
                <p>
                  Avalable Exam
                </p>
              </a>
            </li>
             <li class="nav-item">
              <a href="taken.php" class="nav-link <?= $page == 'taken.php' || $page == 'viewtaken.php' ? 'active': ' ' ?>">
                <i class="nav-icon fa fa-inbox"></i>
                <p>
                  Taken Exam
                </p>
              </a>
            </li>
            <li class="nav-item <?= $page == 'changepassword.php' ? 'menu-open': ' ' ?>">
              <a  class="nav-link">
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
                  <a href="../logout.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                  </a>
                </li>
            </ul>
            </li>
      </nav>