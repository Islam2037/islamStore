<?php
session_start();
if (isset($_POST['updateProduct'])) {
    $errors = [];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $index = $_POST['index'];
    echo $index;
    $image = $_FILES['image'];
    //   print_r($image);
    $imageName = $image['name'];
    $imageError = $image['error'];
    $tmp_name = $image['tmp_name'];
    //   echo $tmp_name;
    $imageSize = $image['size'];

    if (empty($category)) {
        $errors[] = " category is required";
    }
    if (empty($title)) {
        $errors[] = " title is required";
    }
    if (empty($desc)) {
        $errors[] = " desc is required";
    }
    if (empty($price)) {
        $errors[] = " price is required";
    }
    if ($imageError != 0) {
        $errors[] = " image is required";
    }
    if (empty($errors)) {
        move_uploaded_file($tmp_name, "./admin/upload/$imageName");
        $products = ['category' => $category, 'title' => $title, 'desc' => $desc, 'price' => $price, 'imageName' => $imageName];
        $_SESSION['cart'][$index] = $products;
        header("location:cart.php");
    }
    // elseif(!empty($errors))
    // {
    //     $_SESSION['productErros']=$errors;
    //     header("location:addProduct.php");
    // }


}
