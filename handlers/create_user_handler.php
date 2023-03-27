<?php
session_start();
require_once '../validations/validations.php';
require_once '../data/users/users_functions.php';

// 
$errors = [];
$success = [];
$allowed_types = ['admin', 'user'];
if (check_method('POST')) {

    // user attribute sanatizations
    $name = sanatize($_POST['name']);
    $email = sanatize($_POST['email']);
    $password = sanatize($_POST['password']);
    $con_password = sanatize($_POST['con_password']);
    $type = sanatize($_POST['type']);


    // user attribute validations
    // user name validation
    if (empty($name)) {
        $errors[] = 'name is empty, enter the name please';
    } else if (is_numeric($name)) {
        $errors[] = 'name  must me string';
    } else if (maxInput($name, 15)) {
        $errors[] = 'name is too large, max = 15';
    } else if (minInput($name, 3)) {
        $errors[] = 'name is too small, min = 3';
    }

    // email validation
    if (empty($email)) {
        $errors[] = 'email is empty';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'invaled email';
    }


    // password validation
    if (empty($password)) {
        $errors[] = 'password is empty, enter the password please';
    } else if (maxInput($password, 30)) {
        $errors[] = 'name is too large, max = 30';
    } else if (minInput($password, 6)) {
        $errors[] = 'name is too small, min = 6';
    }

    // con password validation
    if (empty($con_password)) {
        $errors[] = 'confirm password is empty, enter the password please';
    } else if ($password !== $con_password) {
        $errors[] = 'password and confirm password must be the same';
    }

    // type validation
    if (empty($type)) {
        $errors[] = 'type is empty, enter the type please';
    } elseif (!in_array($type, $allowed_types)) {
        $errors[] = 'invalied type';
    }



    // check if there is any errors
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;

        redirect("../user/create_user.php");
    } else {
        createUser($name, $email, $password, $type);
        $success[] = 'User Added successfuly!';
        $_SESSION['success'] = $success;
        redirect("../user/create_user.php");
    }
} else {
    $errors[] = 'wrong method';
    $_SESSION['errors'] = $errors;
    redirect("../index.php");
}
