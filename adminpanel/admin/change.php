<?php
session_start();
include '../../pages/config.php';

if(isset($_POST['submit'])){

    $id = $_SESSION['id'];

    $oldpass = md5($_POST['old_password']);
    $newpass = md5($_POST['new_password']);
    $repass = md5($_POST['repaet_password']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    if($oldpass == $row['password']){
        if($newpass != $repass){
            $_SESSION['message'] = "your new password don't match ";
            header('location:changepassword.php');
            ob_end_flush();
            exit(0);
        }else{
    
            
        $affected_row = mysqli_query($conn, "UPDATE users SET password='$repass' WHERE password = '$oldpass' AND id='$id'") or die(mysqli_error());
    
        if($affected_row){
            session_destroy();
            header("Location:index.php");
            ob_end_flush();
            exit(0);
    
        }
        }
    }else{
        $_SESSION['message'] = "your old password don't match";
		header('location:changepassword.php');
        ob_end_flush();
		exit(0);
    }
}

?>