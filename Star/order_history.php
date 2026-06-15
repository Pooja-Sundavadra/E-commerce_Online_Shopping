<?php
session_start();
include("config.php");

/* LOGIN CHECK */
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

/* GET ORDERS */
$q = mysqli_query($conn,"
SELECT o.*, p.name AS product_name, p.image
FROM orders o
JOIN products p ON o.p_id = p.p_id
WHERE o.user_id='$user_id'
ORDER BY o.order_id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Order History</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
    font-family:Segoe UI;
}

.container-box{
    max-width:1000px;
    margin:40px auto;
}

.card-order{
    background:white;
    border-radius:15px;
    padding:15px;
    margin-bottom:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.product-img{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
    border:1px solid #ddd;
}

.status{
    padding:5px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.success{
    background:#d1fae5;
    color:#065f46;
}

.pending{
    background:#fef3c7;
    color:#92400e;
}

.failed{
    background:#fee2e2;
    color:#991b1b;
}

</style>
</head>

<body>

<div class="container container-box">

<h3 class="mb-4">📦 My Order History</h3>

<?php while($row = mysqli_fetch_assoc($q)) { ?>

<div class="card-order">

    <div class="d-flex align-items-center gap-3">

       

        <div>
            <h6 class="mb-1"><?= $row['product_name']; ?></h6>
            <small>Order ID: <?= $row['order_id']; ?></small><br>
            <small>₹<?= $row['price']; ?></small>
        </div>

    </div>

    <div class="text-end">

        <?php if($row['status']=="Success"){ ?>
            <span class="status success">Success</span>
        <?php } elseif($row['status']=="Pending"){ ?>
            <span class="status pending">Pending</span>
        <?php } else { ?>
            <span class="status failed">Failed</span>
        <?php } ?>

        <br><br>
        <small><?= $row['created_at']; ?></small>

        <br><br>

        <a href="fpdf19/receipt.php?order_id=<?= $row['order_id']; ?>"
           class="btn btn-sm btn-primary">
           View Invoice
        </a>

    </div>

</div>

<?php } ?>

</div>

</body>
</html>