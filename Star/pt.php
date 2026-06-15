<?php include("header.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
include("config.php");

$category_query = mysqli_query($conn,"SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Products - LuxeCart</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
rel="stylesheet">

<style>

    

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f8f8f8;
overflow-x:hidden;
}



/* Hero */

.hero{
padding:100px 0 70px;
text-align:center;
background:linear-gradient(135deg,#ff008c,#7a00ff);
color:white;
border-bottom-left-radius:50px;
border-bottom-right-radius:50px;
}

.hero h1{
font-size:65px;
font-weight:800;
}

.hero p{
margin-top:20px;
font-size:20px;
opacity:0.9;
}

/* Product Section */

.products{
padding:100px 0;
}

.product-card{
background:white;
border-radius:30px;
overflow:hidden;
transition:0.4s;
height:100%;
position:relative;
box-shadow:0 10px 30px rgba(0,0,0,0.06);
border:1px solid #eee;
}

.product-card:hover{
transform:translateY(-10px);
box-shadow:0 15px 40px rgba(255,0,140,0.15);
}

.product-card img{
width:100%;
height:280px;
object-fit:cover;
transition:0.4s;
}

.product-card:hover img{
transform:scale(1.05);
}

.product-info{
padding:25px;
}

.product-info h3{
font-size:28px;
font-weight:700;
}

.price{
font-size:28px;
font-weight:700;
color:#ff008c;
}

.btn-cart{
flex:1;
background:linear-gradient(45deg,#ff008c,#7a00ff);
color:white;
padding:12px 20px;
border-radius:50px;
text-decoration:none;
text-align:center;
font-weight:600;
transition:0.3s;
}

.btn-cart:hover{
color:white;
transform:translateY(-3px);
box-shadow:0 10px 25px rgba(255,0,140,0.25);
}



/* Responsive */

@media(max-width:991px){

.hero h1{
font-size:45px;
}

}

</style>

</head>

<body>



<!-- Products -->

<section class="products">

<div class="container">

<div class="row g-4">

<!-- Product 1 -->

<div class="col-lg-4 col-md-6">

<div class="product-card">

<!-- Discount Badge -->

<div class="position-absolute top-0 start-0 m-3">

<span class="badge bg-danger px-3 py-2 rounded-pill">
20% OFF
</span>

</div>

<!-- Wishlist -->



<!-- Image -->

<img src="images/sung.jpg">

<div class="product-info">

<h3>Sunglasses</h3>

<!-- Rating -->

<div class="mb-2 text-warning">

<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-half"></i>

<span class="text-dark ms-2">
4.5
</span>

</div>

<p class="text-muted">
Premium stylish luxury sunglasses.
</p>

<p class="text-success fw-semibold">

<i class="bi bi-check-circle-fill"></i>

In Stock

</p>

<div class="d-flex align-items-center gap-3 mb-4">

<h4 class="price m-0">
₹1,999
</h4>

<del class="text-muted">
₹2,499
</del>

</div>

<div class="d-flex gap-2">

<a href="cart.php"
class="btn-cart">

<i class="bi bi-cart-fill"></i>

Add To Cart

</a>

<a href="checkout.php"
class="btn btn-dark rounded-pill px-4">

Buy

</a>

</div>

</div>

</div>

</div>

<!-- Product 2 -->

<div class="col-lg-4 col-md-6">

<div class="product-card">

<div class="position-absolute top-0 start-0 m-3">

<span class="badge bg-success px-3 py-2 rounded-pill">
NEW
</span>

</div>

<div class="position-absolute top-0 end-0 m-3">

<!-- <button class="btn btn-light rounded-circle shadow">

<i class="bi bi-heart-fill text-danger"></i>

</button> -->

</div>

<img src="images/teddy.jpg">

<div class="product-info">

<h3>Cute TeddyBear</h3>

<div class="mb-2 text-warning">

<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>

<span class="text-dark ms-2">
5.0
</span>

</div>

<p class="text-muted">
Soft premium teddy collection.
</p>

<p class="text-success fw-semibold">

<i class="bi bi-check-circle-fill"></i>

In Stock

</p>

<div class="d-flex align-items-center gap-3 mb-4">

<h4 class="price m-0">
₹800
</h4>

<del class="text-muted">
₹1,099
</del>

</div>

<div class="d-flex gap-2">

<a href="cart.php"
class="btn-cart">

<i class="bi bi-cart-fill"></i>

Add To Cart

</a>

<a href="checkout.php"
class="btn btn-dark rounded-pill px-4">

Buy

</a>

</div>

</div>

</div>

</div>

<!-- Product 3 -->

<div class="col-lg-4 col-md-6">

<div class="product-card">

<div class="position-absolute top-0 start-0 m-3">

<span class="badge bg-primary px-3 py-2 rounded-pill">
HOT
</span>

</div>

<div class="position-absolute top-0 end-0 m-3">



</div>

<img src="images/fan.png">

<div class="product-info">

<h3>Coldest Fan</h3>

<div class="mb-2 text-warning">

<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-half"></i>

<span class="text-dark ms-2">
4.7
</span>

</div>

<p class="text-muted">
Modern cooling technology.
</p>

<p class="text-success fw-semibold">

<i class="bi bi-check-circle-fill"></i>

In Stock

</p>

<div class="d-flex align-items-center gap-3 mb-4">

<h4 class="price m-0">
₹5,499
</h4>

<del class="text-muted">
₹6,499
</del>

</div>

<div class="d-flex gap-2">

<a href="cart.php"
class="btn-cart">

<i class="bi bi-cart-fill"></i>

Add To Cart

</a>

<a href="checkout.php"
class="btn btn-dark rounded-pill px-4">

Buy

</a>

</div>

</div>

</div>

</div>

<!-- Product 4 -->

<div class="col-lg-4 col-md-6">

<div class="product-card">

<div class="position-absolute top-0 start-0 m-3">

<span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
TRENDING
</span>

</div>

<div class="position-absolute top-0 end-0 m-3">


</div>

<img src="images/glu.jpg">

<div class="product-info">

<h3>Glucose</h3>

<div class="mb-2 text-warning">

<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>

<span class="text-dark ms-2">
4.0
</span>

</div>

<p class="text-muted">
Healthy energy drink.
</p>

<p class="text-success fw-semibold">

<i class="bi bi-check-circle-fill"></i>

In Stock

</p>

<div class="d-flex align-items-center gap-3 mb-4">

<h4 class="price m-0">
₹199
</h4>

<del class="text-muted">
₹299
</del>

</div>

<div class="d-flex gap-2">

<a href="cart.php"
class="btn-cart">

<i class="bi bi-cart-fill"></i>

Add To Cart

</a>

<a href="checkout.php"
class="btn btn-dark rounded-pill px-4">

Buy

</a>

</div>

</div>

</div>

</div>

<!-- Product 5 -->

<div class="col-lg-4 col-md-6">

<div class="product-card">

<div class="position-absolute top-0 start-0 m-3">

<span class="badge bg-danger px-3 py-2 rounded-pill">
SALE
</span>

</div>

<div class="position-absolute top-0 end-0 m-3">



</div>

<img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1000&auto=format&fit=crop">

<div class="product-info">

<h3>Nike Shoes</h3>

<div class="mb-2 text-warning">

<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>

<span class="text-dark ms-2">
5.0
</span>

</div>

<p class="text-muted">
Luxury branded shoes.
</p>

<p class="text-success fw-semibold">

<i class="bi bi-check-circle-fill"></i>

In Stock

</p>

<div class="d-flex align-items-center gap-3 mb-4">

<h4 class="price m-0">
₹3,999
</h4>

<del class="text-muted">
₹5,499
</del>

</div>

<div class="d-flex gap-2">

<a href="cart.php"
class="btn-cart">

<i class="bi bi-cart-fill"></i>

Add To Cart

</a>

<a href="checkout.php"
class="btn btn-dark rounded-pill px-4">

Buy

</a>

</div>

</div>

</div>

</div>

<!-- Product 6 -->

<div class="col-lg-4 col-md-6">

<div class="product-card">

<div class="position-absolute top-0 start-0 m-3">

<span class="badge bg-info px-3 py-2 rounded-pill">
PREMIUM
</span>

</div>

<div class="position-absolute top-0 end-0 m-3">


</div>

<img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1000&auto=format&fit=crop">

<div class="product-info">

<h3>Smart Watch</h3>

<div class="mb-2 text-warning">

<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-half"></i>

<span class="text-dark ms-2">
4.8
</span>

</div>

<p class="text-muted">
Premium smart technology watch.
</p>

<p class="text-success fw-semibold">

<i class="bi bi-check-circle-fill"></i>

In Stock

</p>

<div class="d-flex align-items-center gap-3 mb-4">

<h4 class="price m-0">
₹6,999
</h4>

<del class="text-muted">
₹8,499
</del>

</div>

<div class="d-flex gap-2">

<a href="cart.php"
class="btn-cart">

<i class="bi bi-cart-fill"></i>

Add To Cart

</a>

<a href="checkout.php"
class="btn btn-dark rounded-pill px-4">

Buy

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</section>



</body>

</html>
<?php include("footer.php"); ?>