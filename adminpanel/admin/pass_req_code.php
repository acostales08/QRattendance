<?php
session_start();
include '../../pages/config.php';

if(isset($_POST['submit_btn'])){
    $email = $_POST['email'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email ='$email'");

    if(empty($email)){
        $_SESSION['message'] = "please enter your email";
		header('location:password_request.php');
        ob_end_flush();
		exit(0);
    }else{
        if(mysqli_num_rows($query) > 0){
            $token = uniqid(md5(time()));

            $insert_query = mysqli_query($conn, "INSERT INTO forgot_password (email, token) VALUES ('$email', '$token')");

            header("location:recover_password.php?token=$token");
            ob_end_flush();
            exit(0);
        }else{
            $_SESSION['message'] = "User cannot found";
            ob_end_flush();
		header('location:password_request.php');
			exit(0);
        }
    }
}

?>