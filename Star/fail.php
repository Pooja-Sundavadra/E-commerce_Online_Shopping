<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Failed</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f8d7da;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    font-family:Arial;
}
.card-box{
    background:white;
    padding:40px;
    border-radius:12px;
    text-align:center;
    width:400px;
    box-shadow:0px 0px 20px rgba(0,0,0,0.1);
}
h1{
    color:#dc3545;
}
</style>

</head>

<body>

<div class="card-box">

    <h1>❌ Order Failed</h1>

    <p>Your order could not be placed.</p>

    <p>Please try again or check your details.</p>

    <a href="c.php" class="btn btn-danger mt-3">Retry Order</a>
    <a href="index.php" class="btn btn-secondary mt-3">Go Home</a>

</div>

</body>
</html>