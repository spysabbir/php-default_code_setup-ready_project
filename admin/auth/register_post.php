<?php
    require_once('../db/dbConnect.php');
    session_start();

    $register_status = true;
    if(!$_POST['name']) {
        $_SESSION['name_error'] = "Name Nai";
        $register_status = false;
    }else{
        $_SESSION['old_name'] = $_POST['name'];
    }

    if(!$_POST['email']) {
        $_SESSION['email_error'] = "Email Nai";
        $register_status = false;
    }else{
        $_SESSION['old_email'] = $_POST['email'];
    }

    if(!$_POST['password']) {
        $_SESSION['password_error'] = "Password Nai";
        $register_status = false;
    }

    if(!$_POST['confirm_password']) {
        $_SESSION['confirm_password_error'] = "Confirm password Nai";
        $register_status = false;
    }

    if(!isset($_POST['gender'])) {
        $_SESSION['gender_error'] = "Gender Nai";
        $register_status = false;
    }else{
        $_SESSION['old_gender'] = $_POST['gender'];
    }

    if($_POST['password'] != $_POST['confirm_password']) {
        $_SESSION['password_match_error'] = "Password and  confirm password not matching";
        $register_status = false;
    }

    if($register_status) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $gender = $_POST['gender'];

        $email_check = "SELECT email FROM users WHERE email = '$email'";
        $email_check_result = mysqli_query($db_connect, $email_check);

        if(mysqli_num_rows($email_check_result) > 0) {
            $_SESSION['email_exists_error'] = "Email already exists";
            header('location: register.php');
        }else{
            date_default_timezone_set('Asia/Dhaka');
            $current_date_time = date('Y-m-d H:i:s A');

            $insert_query = "INSERT INTO users (name, email, password, gender, created_at) VALUES ('$name', '$email', '$password', '$gender', '$current_date_time')";
            mysqli_query($db_connect, $insert_query);

            $_SESSION['register_success'] = "register_success";

            header('location: login.php');
        }
    }else{
        header('location: register.php');
    }
?>