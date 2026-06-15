

<?php
session_start();
include("config.php");

// 🔐 LOGIN CHECK
if(!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM products WHERE p_id='$id'");
$product = mysqli_fetch_assoc($query);

// CART LOGIC
if(isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['qty']++;
} else {
    $_SESSION['cart'][$id] = [
        "name" => $product['name'],
        "price" => $product['price'],
        "image" => $product['image'],
        "qty" => 1
    ];
}

header("Location: view_cart.php");
exit;
?>