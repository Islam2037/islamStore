<?php
session_start();
if(isset($_POST['remove']))
{
    $index=$_POST['index'];
    unset($_SESSION['cart'][$index]);
    unset($_SESSION['quantity'][$index]);
    // print_r($_SESSION['cart']);
    $_SESSION['quantity'] = array_values($_SESSION['quantity']);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("location:cart.php");
}
else
{
    echo "not correct";
}
