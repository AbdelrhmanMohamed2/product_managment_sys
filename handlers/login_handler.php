<?php
session_start();
require_once '../validations/validations.php';
require_once '../data/users/users_functions.php';

// 
$errors = [];

if (check_method('POST')) {

    // product attribute sanatizations
    $user_email = sanatize($_POST['user_email']);
    $password = sanatize($_POST['password']);


    // user attribute validations
    // user name validation
    if (empty($user_email)) {
        $errors[] = 'user email is empty';
    } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'invaled email';
    }

    // product price validation
    if (empty($password)) {
        $errors[] = 'password is empty';
    }

    $user = login($user_email, $password);
    if ($user === false) {
        $errors[] = 'invaled user';
    }




    // check if there is any errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        redirect("../user/login.php");
    } else {

        $_SESSION['loged'] = $user;
        redirect("../index.php");
    }
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect("../index.php");
}
