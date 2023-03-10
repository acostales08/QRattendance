<?php
ob_start();
session_start();
include '../config.php';

if(isset($_POST['submit'])){

    $id = $_SESSION['id'];

    $oldpass = md5($_POST['old_password']);
    $newpass = md5($_POST['new_password']);
    $repass = md5($_POST['repaet_password']);

    $query = mysqli_query($conn, "SELECT * FROM faculty WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    if($oldpass == $row['Password']){
        
        if($newpass != $repass){
                $_SESSION['info'] = "your new password not match";
                header('location:changepassword.php');
                ob_end_flush();
                exit(0);
            }else{

                
            $affected_row = mysqli_query($conn, "UPDATE faculty SET Password='$repass' WHERE Password = '$oldpass' AND id='$id'") or die(mysqli_error());

            if($affected_row){
                session_destroy();

                header("Location: ../../pages/login/login2.php");
                ob_end_flush();
                exit(0);
            }
        }

    }else{
        $_SESSION['info'] = "your old password not match ";
		header('location:changepassword.php');
		ob_end_flush();
                exit(0);
    }

    
}

?>

