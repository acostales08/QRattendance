<?php 
session_start();
include '../config.php';

 if(isset($_POST['submit']))
 {
    $exmneId = $_POST['exmneId'];
     $id=$_POST['examid'];
     $selExamAttmpt = mysqli_query($conn, "SELECT * FROM student_info WHERE sid='$exmneId' AND view='yes'");

     if(mysqli_num_rows($selExamAttmpt) > 0)
     {
        header("location:viewtaken.php?id=$id");
        exit(0);  
     }
     else
     {

        $_SESSION['info'] = "Unable to view the exam";
        header("Location: taken.php");
        exit(0);
     }
   
}

?>