<?php
session_start();
require_once '../validations/validations.php';
require_once '../data/product/products_functions.php';

// 
$errors = [];
$success = [];
$allow_file = ['jpg', 'png'];
if (check_method('POST')) {

    // product attribute sanatizations
    $product_id = sanatize($_POST['product_id']);
    $product_name = sanatize($_POST['product_name']);
    $product_price = sanatize($_POST['product_price']);
    $product_description = sanatize($_POST['product_description']);



    // product attribute validations
    // product name validation
    if (empty($product_name)) {
        $errors[] = 'product name is empty, enter the product name please';
    } else if (is_numeric($product_name)) {
        $errors[] = 'product name  must me string';
    } else if (maxInput($product_name, 30)) {
        $errors[] = 'product name is too large, max = 30';
    } else if (minInput($product_name, 4)) {
        $errors[] = 'product name is too small, min = 4';
    }

    // product price validation
    if (empty($product_price)) {
        $errors[] = 'product price is empty, enter the product price please';
    } else if (!is_numeric($product_price)) {
        $errors[] = 'product price  must be numeric value';
    }


    // product description validation
    if (empty($product_description)) {
        $errors[] = 'product description is empty, enter the product description please';
    } else if (is_numeric($product_description)) {
        $errors[] = 'product description  must me string';
    } else if (maxInput($product_description, 60)) {
        $errors[] = 'product name is too large, max = 50';
    } else if (minInput($product_description, 10)) {
        $errors[] = 'product name is too small, min = 10';
    }


    // product img validation
    $product_img = $_FILES['product_img'];

    $img_name = $product_img['name'];
    $img_type = $product_img['type'];
    $img_tmp_name = $product_img['tmp_name'];
    $img_error = $product_img['error'];
    $img_size = $product_img['size'];

    $new_name = '';

    if ($img_name != '') {
        $ext = pathinfo($img_name);
        $img_extension = $ext['extension'];

        if ($img_error !== 0) {
            $errors[] = 'somthing went wrong, try again';
        } else if ($img_size > 500000) {
            $errors[] = 'img too big';
        } else if ($img_size < 1000) {
            $errors[] = 'img too small';
        } else if (!in_array($img_extension, $allow_file)) {
            $errors[] = 'not allowed file type';
        } else {
            $new_name = uniqid('', true) . "." . $img_extension;
            $new_path = "../data/product/imges/" . $new_name;
            if (!move_uploaded_file($img_tmp_name, $new_path)) {
                $errors[] = 'somthing went wrong, try again';
            }
        }
    }

    // var_dump($new_name == '');
    // die;



    // check if there is any errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("../product/update.php?id=$product_id");
    } else {
        updateProduct($product_id, $product_name, $product_price, $product_description, $new_name);
        $success[] = 'Product updated successfuly!';
        $_SESSION['success'] = $success;
        redirect("../product/update.php?id=$product_id");
    }
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect("../index.php");
}
