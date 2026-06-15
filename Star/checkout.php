<?php
session_start();
include("config.php");

// LOGIN CHECK
if(!isset($_SESSION['user_id'])){
    header("Location: login.html");
    exit;
}

$user_id = $_SESSION['user_id'];

// PRODUCT ID CHECK
if(!isset($_GET['p_id'])){
    die("Invalid Request");
}

$product_id = $_GET['p_id'];

// PRODUCT FETCH
$product_query = mysqli_query($conn,"SELECT * FROM products WHERE p_id='$product_id'");
$product = mysqli_fetch_assoc($product_query);

if(!$product){
    die("Product Not Found");
}

// USER FETCH
$user_query = mysqli_query($conn,"SELECT * FROM user_details WHERE user_id='$user_id'");
$user = mysqli_fetch_assoc($user_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Secure Checkout</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg, #ff4ecd, #7b2ff7, #ffffff);
    font-family: Arial, sans-serif;
    min-height: 100vh;
}

/* PAGE TITLE */
h2{
    color: #ffffff;
    font-weight: 800;
    text-shadow: 0 3px 10px rgba(0,0,0,0.2);
}

/* MAIN CARD */
.checkout-card{
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 22px;
    padding: 25px;
    box-shadow: 0 15px 40px rgba(123,47,247,0.3);
    color: #2b2b2b;
}

/* PRODUCT IMAGE */
.product-image{
    width: 100%;
    height: 340px;
    object-fit: cover;
    border-radius: 16px;
    border: 3px solid #ff4ecd;
}

/* PRODUCT TITLE */
.product-title{
    font-size: 28px;
    font-weight: bold;
    margin-top: 15px;
    color: #7b2ff7;
}

/* PRICE */
.product-price{
    font-size: 32px;
    font-weight: bold;
    color: #ff4ecd;
}

/* INPUT FIELDS */
.form-control{
    border-radius: 12px;
    padding: 10px;
    border: 1px solid #ddd;
    transition: 0.3s;
}

.form-control:focus{
    border: 2px solid #7b2ff7;
    box-shadow: 0 0 10px rgba(123,47,247,0.3);
}

/* LABEL */
label{
    font-weight: bold;
    color: #7b2ff7;
}

/* ALERT */
.alert{
    border-radius: 12px;
}

/* TOTAL BOX */
.total-box{
    background: linear-gradient(135deg, #7b2ff7, #ff4ecd);
    border-radius: 15px;
    padding: 15px;
    font-size: 20px;
    font-weight: bold;
    color: #fff;
    text-align: center;
}

/* BUTTON */
.place-btn{
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, #ff4ecd, #7b2ff7);
    color: white;
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: 0 8px 20px rgba(123,47,247,0.3);
}

.place-btn:hover{
    transform: scale(1.05);
    box-shadow: 0 12px 25px rgba(255,78,205,0.4);
}
</style>

</head>

<body>

<div class="container py-5">

<h2 class="mb-4 text-primary fw-bold">🛒 Secure Checkout</h2>

<div class="row g-4">

<!-- PRODUCT -->
<div class="col-md-6">
<div class="checkout-card">

<img src="<?= $product['image']; ?>" class="product-image">

<h3 class="product-title mt-3"><?= $product['name']; ?></h3>

<p class="text-muted"><?= $product['description']; ?></p>

<div class="product-price">₹<?= $product['price']; ?></div>

<hr>

<p>🚚 Delivery: 2 - 5 Days</p>
<p>📦 Stock: <?= $product['stock']; ?></p>

</div>
</div>

<!-- FORM -->
<div class="col-md-6">
<div class="checkout-card">

<h4 class="mb-3">📦 Shipping Details</h4>

<!-- ERROR ALERT -->
<?php if(!empty($error)) { ?>
    <div class="alert alert-danger">
        <?= $error; ?>
    </div>
<?php } ?>

<form action="payment/pay.php" method="POST">

<input type="hidden" name="p_id" value="<?= $product_id ?>">
<input type="hidden" name="amount" value="<?= $product['price'] ?>">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control"
 required>
</div>

<div class="mb-3">
<label>Contact Number</label>
<input type="text" name="contact" class="form-control"
 required>
</div>

<div class="mb-3">
<label>Delivery Address</label>
<textarea name="address" class="form-control" rows="4" required></textarea>
</div>

<div class="mb-3">
<label>Pincode</label>
<input type="text" name="pincode" class="form-control"
>
</div>

<div class="alert alert-warning">
🔒 Secure Payment Gateway
</div>

<div class="total-box mb-3">
Total Payable: ₹<?= $product['price']; ?>
</div>

<button type="submit" name="place_now" class="place-btn">💳 Pay Now</button>

</form>
</div>
</div>

</div>

</div>

</body>
</html>