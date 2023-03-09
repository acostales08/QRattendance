<?php
session_start();
include '../../pages/config.php';


if(isset($_POST['submit_btn'])){
    
    $token = $_POST['token'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpassword'];


        if($password == $confirmpass){
            $pass = md5($password);

            $query = mysqli_query($conn, "UPDATE users set password='$pass' where email='$email'");
            header('location:index.php');
            exit(0);
        }else{
            $_SESSION['message'] = "Passwords do not match";
            header("location:recover_password.php?token=$token");
            ob_end_flush();
            exit(0);
        }
    
}

?>