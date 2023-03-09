<?php
session_start();
include '../config.php';

if(isset($_POST['submit'])){

    $id = $_SESSION['sid'];

    $oldpass = md5($_POST['old_password']);
    $newpass = md5($_POST['new_password']);
    $repass = md5($_POST['repaet_password']);

    $query = mysqli_query($conn, "SELECT * FROM student_info WHERE sid = '$id'");
    $row = mysqli_fetch_assoc($query);

    if($oldpass == $row['Password']){
        if($newpass != $repass){
            $_SESSION['info'] = "Your new password not match ";
            header('location:changepassword.php');
            exit(0);
        }else{
    
            
        $affected_row = mysqli_query($conn, "UPDATE student_info SET Password='$repass' WHERE Password = '$oldpass' AND sid='$id'") or die(mysqli_error());
    
            if($affected_row){
                session_destroy();
        
                header("Location: ../../pages/login/login.php");
        
            }
        }
    }else{
        $_SESSION['error'] = "Your old password not match ";
        header('location:changepassword.php');
        exit(0);
    }
}

?>