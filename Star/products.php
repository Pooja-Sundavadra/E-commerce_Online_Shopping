<?php include("header.php"); ?>

<?php
include("config.php");

if(isset($_GET['category_id']))
{
    $category_id = $_GET['category_id'];

    $product_query = mysqli_query($conn,"
    SELECT * FROM products
    WHERE category_id='$category_id'
    ");
}
else
{
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Products</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f8f9fa;
    font-family:Poppins,sans-serif;
}

.page-title{
    text-align:center;
    font-size:50px;
    font-weight:800;
    margin-bottom:50px;
}

.product-card{
    background:#fff;
    border-radius:25px;
    overflow:hidden;
    height:100%;
    transition:.4s;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 40px rgba(255,0,140,.18);
}

.product-card img{
    width:100%;
    height:280px;
    object-fit:cover;
}

.product-info{
    padding:20px;
}

.product-info h4{
    font-size:24px;
    font-weight:700;
}

.price{
    color:#ff008c;
    font-size:28px;
    font-weight:700;
    margin:10px 0;
}

.btn-main{
    background:linear-gradient(45deg,#ff008c,#7a00ff);
    border:none;
    color:#fff;
    padding:12px 20px;
    border-radius:50px;
    text-decoration:none;
    text-align:center;
}

.btn-main:hover{
    color:#fff;
}

</style>

</head>

<body>

<div class="container py-5">

<h1 class="page-title"> <br>Products</h1>

<div class="row g-4">

<?php while($row = mysqli_fetch_assoc($product_query)) { ?>

<div class="col-lg-4 col-md-6">

<div class="product-card">

<img src="<?php echo $row['image']; ?>" alt="">

<div class="product-info">

<h4><?php echo $row['name']; ?></h4>

<p class="price">
₹<?php echo number_format($row['price']); ?>
</p>

<p>
<?php echo $row['description']; ?>
</p>

<p>
Stock :
<b><?php echo $row['stock']; ?></b>
</p>

<div class="d-flex gap-2">

<a href="cart.php?id=<?php echo $row['p_id']; ?>"
class="btn-main flex-fill">
Add To Cart
</a>

<a href="checkout.php?p_id=<?php echo $row['p_id']; ?>"
class="btn btn-dark flex-fill rounded-pill">
Buy Now
</a>

</div>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>
<?php include("footer.php"); ?>