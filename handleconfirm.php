<?php
if (isset($_POST['confirm'])) {
    session_start();
    $confirmErrors = [];
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $paymentType = trim(htmlspecialchars($_POST['paymentType']));
    $postalcode = trim(htmlspecialchars($_POST['postalcode']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $address = trim(htmlspecialchars($_POST['address']));
    $city = trim(htmlspecialchars($_POST['city']));
    // echo $name ,$email,$paymentType,$address,$phone,$city,$postalcode;

    if (empty($name)) {
        $confirmErrors[] = "user name is required";
    } elseif (!is_string($name)) {
        $confirmErrors[] = "user name must be charactar";
    } elseif (strlen($name) < 4 || strlen($name) > 50) {
        $confirmErrors[] = "user name must be greater than 4 char and less than 50 char";
    }
    if (empty($city)) {
        $confirmErrors[] = "city is required";
    } elseif (!is_string($city)) {
        $confirmErrors[] = "city must be charactar";
    } elseif (strlen($city) < 4 || strlen($city) > 50) {
        $confirmErrors[] = "city must be greater than 4 char and less than 50 char";
    }
    if (empty($email)) {
        $confirmErrors[] = "email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $confirmErrors[] = "email not correct";
    } elseif (strlen($email) < 6 || strlen($email) > 50) {
        $confirmErrors[] = "email must be greater than 6 char and less than 50 char";
    }
    if (empty($phone)) {
        $confirmErrors[] = "phone is required";
    } elseif (is_int($phone)) {
        $confirmErrors[] = "phone not correct";
    } elseif (strlen($phone) < 11 || strlen($phone) > 11) {
        $confirmErrors[] = "phone must be equal 11 number";
    }
    if (empty($postalcode)) {
        $confirmErrors[] = "postalcode is required";
    } elseif (is_int($postalcode)) {
        $confirmErrors[] = "postalcode not correct";
    } elseif (strlen($postalcode) < 5) {
        $confirmErrors[] = "postalcode must be greater than 5 number";
    }
    if (empty($address)) {
        $confirmErrors[] = "address name is required";
    } elseif (!is_string($address)) {
        $confirmErrors[] = "address name must be charactar";
    } elseif (strlen($address) < 4 || strlen($address) > 50) {
        $confirmErrors[] = "address name must be greater than 4 char and less than 50 char";
    }
    if (!empty($confirmErrors)) {
        $_SESSION['confirmErrors'] = $confirmErrors;
        $_SESSION['name'] = $name;
        $_SESSION['city'] = $city;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['address'] = $address;
        $_SESSION['postalcode'] = $postalcode;

        header("location:confirm.php");
    } else {
        $_SESSION['successMes'] = "succsees";
        header("location:confirm.php");
    }
} else {
    header("location:confirm.php");
}
