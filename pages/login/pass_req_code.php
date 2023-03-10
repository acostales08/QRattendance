<?php
session_start();
include '../config.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    $query = mysqli_query($conn, "SELECT * FROM faculty WHERE email ='$email'");

    if(empty($email)){
        $_SESSION['message'] = "please enter your email";
		header('location:pass_request1.php');
		exit(0);
    }else{
        if(mysqli_num_rows($query) > 0){
            $token = uniqid(md5(time()));

            $insert_query = mysqli_query($conn, "INSERT INTO forgot_password (email, token) VALUES ('$email', '$token')");

            header("location:pass_recovery1.php?token=$token");
            exit(0);
        }else{
            $_SESSION['message'] = "User cannot found";
		header('location:pass_request1.php');
			exit(0);
        }
    }
}

?>