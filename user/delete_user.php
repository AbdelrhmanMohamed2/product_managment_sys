<?php
session_start();
require_once '../validations/validations.php';
require_once '../data/users/users_functions.php';

if (!isset($_GET['id']) || !isset($_SESSION['loged']) || $_SESSION['loged']['type'] !== "admin") {
    redirect('../index.php');
}

deleteUser($_GET['id']);
redirect('all_users.php');
