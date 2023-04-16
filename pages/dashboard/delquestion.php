<?php
include '../config.php';

if(isset($_POST['exId']))
{
    $id=$_POST['delete'];
    $student_id = mysqli_real_escape_string($conn, $_POST['exId']);

    $query = "DELETE FROM exam_question WHERE eqt_id='$student_id' ";
    $query_run = mysqli_query($conn, $query);}
    header("location:manage-exam.php?id=$id");
    ob_end_flush();
		   exit(0);
    ?>