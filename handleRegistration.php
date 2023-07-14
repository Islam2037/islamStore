<?php
session_start();
if (isset($_POST['signup'])) {
    $errors = [];
    $userName = trim(htmlspecialchars($_POST['user_name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $address = trim(htmlspecialchars($_POST['address']));
    if (empty($userName)) {
        $errors[] = "user name is required";
    } elseif (!is_string($userName)) {
        $errors[] = "user name must be charactar";
    } elseif (strlen($userName) < 4 || strlen($userName) > 50) {
        $errors[] = "user name must be greater than 4 char and less than 50 char";
    }
    if (empty($password)) {
        $errors[] = "password is required";
    } elseif (!is_string($password)) {
        $errors[] = "password must be charactar";
    } elseif (strlen($password) < 4 || strlen($password) > 50) {
        $errors[] = "password must be greater than 4 char and less than 50 char";
    }
    if (empty($email)) {
        $errors[] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email not correct";
    } elseif (strlen($email) < 6 || strlen($email) > 50) {
        $errors[] = "email must be greater than 6 char and less than 50 char";
    }
    if (empty($phone)) {
        $errors[] = "phone is required";
    } elseif (is_int($phone)) {
        $errors[] = "phone not correct";
    } elseif (strlen($phone) < 10) {
        $errors[] = "phone must be greater than 10 char";
    }
    if (empty($address)) {
        $errors[] = "address name is required";
    } elseif (!is_string($address)) {
        $errors[] = "address name must be charactar";
    } elseif (strlen($address) < 4 || strlen($address) > 50) {
        $errors[] = "address name must be greater than 4 char and less than 50 char";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['userName'] = $userName;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['address'] = $address;
        header("location:registration.php");
    } else {
        $userInfo = ['username' => $userName, 'password' => $password, 'email' => $email, 'phone' => $phone, 'address' => $address];
        if (!isset($_SESSION['userinfo'])) {
            $_SESSION['userinfo'] = array();
        }
        array_push($_SESSION['userinfo'], $userInfo);
        // unset($_SESSION['userinfo']);
        print_r($_SESSION['userinfo']);
        header("location:login.php");
    }
} else {
    header("location:registration.php");
}
