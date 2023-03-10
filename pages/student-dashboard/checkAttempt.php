<?php 
session_start();
include '../config.php';

 if(isset($_POST['exId']))
 {
    $exmneId = $_POST['exmneId'];
     $id=$_POST['start'];
     $selExamAttmpt = mysqli_query($conn, "SELECT * FROM exam_attempt WHERE exmne_id='$exmneId' AND exam_id='$id' ");

     if(mysqli_num_rows($selExamAttmpt) > 0)
     {
        $_SESSION['info'] = "you already take this exam";
        header("Location: student.php");
        ob_end_flush();
            exit(0);
      
     }
     else
     {
        header("location:exam.php?id=$id");
        ob_end_flush();
            exit(0);
     }
     
}

?>