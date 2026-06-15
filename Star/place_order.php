<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$product_id = $_POST['product_id'];
$name = $_POST['name'];
$contact = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$price = $_POST['price'];
$payment_method = $_POST['payment_method'];

$status = "Success";

$sql = "INSERT INTO orders
(
user_id,
p_id,
name,
contact,
address,
city,
pincode,
price,
payment_method,
status
)
VALUES
(
'$user_id',
'$product_id',
'$name',
'$contact',
'$address',
'$city',
'$pincode',
'$price',
'$payment_method',
'$status'
)";

$result = mysqli_query($conn, $sql);

if($result){

    $order_id = mysqli_insert_id($conn);  // ⭐ IMPORTANT FIX

    header("Location: fpdf19/success.php?status=success&order_id=".$order_id);
    exit;

} else {
    header("Location: fail.php?status=error");
    exit;
}
?>