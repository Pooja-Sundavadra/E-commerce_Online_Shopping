<?php
require('vendor/autoload.php');
require('../config.php');

use Razorpay\Api\Api;

$key_id = "rzp_live_T0E03YO2u78Pfu";
$key_secret = "IxFXhxbSWSxuk11XiV1eBUoX";

$api = new Api($key_id, $key_secret);

// ✅ GET DATA FROM CHECKOUT
$name    = $_POST['name'] ?? '';
$contact = $_POST['contact'] ?? '';
$address = $_POST['address'] ?? '';
$p_id    = $_POST['p_id'] ?? 0;
$amount  =  1;

// ❌ VALIDATION
if ($name == '' || $contact == '' || $address == '' || $amount <= 0) {
    die("Invalid request - fill all fields");
}

// ✅ GET PRODUCT
$product = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM products WHERE p_id='$p_id'")
);

if(!$product){
    die("Product not found");
}

// convert rupees → paise
$amount_paise = $amount * 100;

// CREATE ORDER
$order = $api->order->create([
    'receipt' => 'rcpt_' . time(),
    'amount' => $amount_paise,
    'currency' => 'INR',
]);

$order_id = $order['id'];

// INSERT INTO checkout TABLE
$status = 'created';

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO checkout (name, contact, address, amount, p_id, razorpay_order_id, status)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "sssisss",
    $name,
    $contact,
    $address,
    $amount,
    $p_id,
    $order_id,
    $status
);

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<h3>Redirecting to payment...</h3>

<script>
var options = {
    "key": "<?= $key_id ?>",
    "amount": "<?= $amount_paise ?>",
    "currency": "INR",
    "name": "My Store",
    "description": "Product Payment",
    "order_id": "<?= $order_id ?>",

    "handler": function (response) {
        window.location.href =
        "verify.php?payment_id=" + response.razorpay_payment_id +
        "&order_id=" + response.razorpay_order_id +
        "&signature=" + response.razorpay_signature;
    },

    "prefill": {
        "name": "<?= $name ?>",
        "contact": "<?= $contact ?>"
    },

    "theme": {
        "color": "#7b2ff7"
    }
};

var rzp = new Razorpay(options);
rzp.open();
</script>

</body>
</html>