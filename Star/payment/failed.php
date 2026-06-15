<?php
$error = $_GET['error'] ?? 'Payment could not be completed';
$order_id = $_GET['order_id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Failed</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #1f1c2c, #928dab);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
}

.card{
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    border:1px solid rgba(255,255,255,0.15);
    padding:40px;
    border-radius:20px;
    text-align:center;
    max-width:450px;
    width:90%;
    box-shadow:0 20px 50px rgba(0,0,0,0.4);
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn{
    from{opacity:0; transform: translateY(20px);}
    to{opacity:1; transform: translateY(0);}
}

.icon{
    font-size:70px;
    color:#ff4d4d;
    margin-bottom:15px;
}

h1{
    margin:10px 0;
    font-size:28px;
}

p{
    color:#d1d5db;
    font-size:14px;
    line-height:1.6;
}

.box{
    background: rgba(0,0,0,0.3);
    padding:10px;
    border-radius:10px;
    margin:15px 0;
    font-size:13px;
    word-break:break-word;
}

.btn{
    display:inline-block;
    margin-top:15px;
    padding:12px 25px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
}

.retry{
    background:#ff4d4d;
    color:#fff;
}

.retry:hover{
    background:#e60000;
    transform:scale(1.05);
}

.home{
    background:#4f46e5;
    color:#fff;
    margin-left:10px;
}

.home:hover{
    background:#3730a3;
    transform:scale(1.05);
}
</style>
</head>

<body>

<div class="card">

    <div class="icon">✕</div>

    <h1>Payment Failed</h1>

    <p>
        Unfortunately, your payment was not successful.<br>
        Please try again or use another payment method.
    </p>

    <?php if(!empty($error)){ ?>
        <div class="box">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php } ?>

    <?php if(!empty($order_id)){ ?>
        <div class="box">
            Order ID: <?= htmlspecialchars($order_id); ?>
        </div>
    <?php } ?>

    <a href="javascript:history.back()" class="btn retry">Try Again</a>
    <a href="index.php" class="btn home">Go Home</a>

</div>

</body>
</html>