<?php
session_start();
require_once '../validations/validations.php';
require_once '../data/product/products_functions.php';

if (!isset($_GET['id']) || !isset($_SESSION['loged']) || $_SESSION['loged']['type'] !== "admin") {
    redirect('../index.php');
}

deleteProduct($_GET['id']);
redirect('../index.php');
