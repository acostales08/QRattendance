<?php
session_start();
include '../../pages/config.php';

if(isset($_POST['submit'])){

    $id = $_SESSION['id'];

    $oldpass = md5($_POST['old_password']);
    $newpass = md5($_POST['new_password']);
    $repass = md5($_POST['repaet_password']);

    if($newpass != $repass){
        $_SESSION['message'] = "password not match ";
		header('location:changepassword.php');
		exit(0);
    }else{

        
    $affected_row = mysqli_query($conn, "UPDATE users SET password='$repass' WHERE password = '$oldpass' AND id='$id'") or die(mysqli_error());

    if($affected_row){
        session_destroy();

        header("Location:index.php");

    }
    }
}

?>