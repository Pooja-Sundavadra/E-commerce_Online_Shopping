<?php
session_start();

// 🔐 LOGIN CHECK
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

unset($_SESSION['cart'][$id]);

header("Location: view_cart.php");
exit;
?>