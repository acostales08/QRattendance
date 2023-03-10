<?php
session_start();
include '../config.php';


if(isset($_POST['submit'])){
    
    $token = $_POST['token'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmpassword'];


        if($password == $confirmpass){
            $pass = md5($password);

            $query = mysqli_query($conn, "UPDATE faculty set Password='$pass' where email='$email'");
            header('location:login2.php');
            exit(0);
        }else{
            $_SESSION['message'] = "Passwords do not match";
            header("location:pass_recovery1.php?token=$token");
            ob_end_flush();
            exit(0);
        }
    
}

?>