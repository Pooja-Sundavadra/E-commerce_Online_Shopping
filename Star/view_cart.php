<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .title{
            font-weight:700;
            margin-bottom:25px;
        }

        .cart-card{
            border:0;
            border-radius:16px;
            overflow:hidden;
            transition:0.3s;
            background:#fff;
        }

        .cart-card:hover{
            transform:translateY(-6px);
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
        }

        .cart-img{
            height:210px;
            object-fit:cover;
        }

        .price{
            display:inline-block;
            background:#198754;
            color:#fff;
            padding:4px 10px;
            border-radius:8px;
            font-size:14px;
            margin-bottom:6px;
        }

        .qty{
            font-size:14px;
            color:#666;
        }

        .total{
            font-weight:700;
        }

        .btn-remove{
            width:48%;
        }

        .btn-buy{
            width:48%;
        }

        .summary-box{
            background:#fff;
            padding:20px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="title">🛒 My Shopping Cart</h2>

    <div class="row">

    <?php
    $grand_total = 0;

    if (!empty($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $id => $item) {

            $total = $item['price'] * $item['qty'];
            $grand_total += $total;
    ?>

        <!-- CARD START -->
        <div class="col-md-4 mb-4">

            <div class="card cart-card">

                <img src="<?php echo $item['image']; ?>" class="cart-img w-100">

                <div class="card-body">

                    <h5 class="mb-2">
                        <?php echo $item['name']; ?>
                    </h5>

                    <span class="price">
                        ₹<?php echo $item['price']; ?>
                    </span>

                    <p class="qty">Quantity: <?php echo $item['qty']; ?></p>

                    <p class="total">Total: ₹<?php echo $total; ?></p>

                    <div class="d-flex justify-content-between mt-3">

                        <a href="remove_cart.php?id=<?php echo $id; ?>"
                           class="btn btn-danger btn-sm btn-remove"
                           onclick="return confirm('Remove item?')">
                            Remove
                        </a>

                        <a href="buy.php?id=<?php echo $id; ?>"
                           class="btn btn-success btn-sm btn-buy">
                            Buy
                        </a>

                    </div>

                </div>
            </div>

        </div>
        <!-- CARD END -->

    <?php
        }
    } else {
        echo "<div class='text-center'><h5>🛒 Your cart is empty</h5></div>";
    }
    ?>

    </div>

    <!-- GRAND TOTAL -->
    

</div>

</body>
</html>