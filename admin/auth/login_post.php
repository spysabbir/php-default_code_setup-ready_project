<?php
    require_once('../db/dbConnect.php');
    session_start();

    $login_status = true;
    if(!$_POST['email']) {
        $_SESSION['email_error'] = "Email Nai";
        $login_status = false;
    }else{
        $_SESSION['old_email'] = $_POST['email'];
    }

    if(!$_POST['password']) {
        $_SESSION['password_error'] = "Password Nai";
        $login_status = false;
    }

    if($login_status) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        $auth_check = "SELECT email FROM users WHERE email = '$email' AND password = '$password'";
        $auth_check_result = mysqli_query($db_connect, $auth_check);

        if(mysqli_num_rows($auth_check_result) > 0) {

            $_SESSION['login_success'] = "login_success";

            header('location: ../dashboard.php');
        }else{
            $_SESSION['login_error'] = "login_error";

            header('location: login.php');
        }
    }else{
        header('location: login.php');
    }
?>