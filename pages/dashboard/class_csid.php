<?php
     $class_subject = $_POST['class'];
     header("location: class.php?id=$class_subject");
     ob_end_flush();
     exit(0);
?>