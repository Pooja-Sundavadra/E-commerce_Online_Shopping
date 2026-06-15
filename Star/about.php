<?php include("header.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us | Star Shopping</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    font-family: 'Poppins', sans-serif;
    background: #fff7fb;
}

.hero{
    background: linear-gradient(135deg,#ff4e8a,#a855f7);
    color:white;
    padding:120px 0;
    border-radius:0 0 80px 80px;
}

.hero h1{
    font-size:70px;
    font-weight:bold;
}

.hero p{
    font-size:22px;
}

.btn-shop{
    background:white;
    color:#ff4e8a;
    border:none;
    padding:15px 35px;
    border-radius:50px;
    font-weight:bold;
    transition:0.4s;
}

.btn-shop:hover{
    background:#000;
    color:white;
}

.image-box img{
    width:100%;
    animation: float 3s infinite ease-in-out;
}

@keyframes float{
    0%{transform:translateY(0);}
    50%{transform:translateY(-20px);}
    100%{transform:translateY(0);}
}

.counter-box{
    background:white;
    border-radius:25px;
    box-shadow:0 5px 25px rgba(0,0,0,.1);
    padding:30px;
    text-align:center;
    transition:.4s;
}

.counter-box:hover{
    transform:translateY(-10px);
}

.counter-box i{
    font-size:45px;
    color:#ff4e8a;
}

.counter-box h2{
    color:#a855f7;
    margin-top:15px;
}

.mission-card,
.choose-card{
transition:0.5s;
}

.mission-card:hover,
.choose-card:hover{
transform:translateY(-12px);
box-shadow:0px 15px 40px rgba(0,0,0,0.15)!important;
}

.developer-card{
    transition:0.5s;
}

.developer-card:hover{
    transform:translateY(-10px);
}


</style>
</head>

<body>

<section class="hero">
<div class="container">
<div class="row align-items-center">

<div class="col-md-6">
<h1>💖 Welcome To Star Shopping</h1>

<p class="mt-4">
Shop Smart, Live Better ✨<br>
Your happiness is our priority.
</p>

<a href="index.php" class="btn btn-shop mt-3">
Start Shopping
</a>


</div>

<div class="col-md-6 text-center image-box">
<img src="images/online.avif">
</div>

</div>
</div>
</section>


<div class="container mt-5">
<div class="row g-4">

<div class="col-md-3">
<div class="counter-box">
<i class="fa-solid fa-users"></i>
<h2>1000+</h2>
<p>Happy Customers</p>
</div>
</div>

<div class="col-md-3">
<div class="counter-box">
<i class="fa-solid fa-cart-shopping"></i>
<h2>500+</h2>
<p>Products</p>
</div>
</div>

<div class="col-md-3">
<div class="counter-box">
<i class="fa-solid fa-truck"></i>
<h2>24/7</h2>
<p>Fast Delivery</p>
</div>
</div>

<div class="col-md-3">
<div class="counter-box">
<i class="fa-solid fa-shield-heart"></i>
<h2>100%</h2>
<p>Secure Payment</p>
</div>
</div>

</div>
</div>

<!-- Our Story Section Start -->

<section class="container py-5">

    <div class="row align-items-center">

        <div class="col-lg-6">
            <img src="images/shop.jpeg" class="img-fluid rounded-5 shadow">
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">

            <h5 class="text-danger fw-bold">ABOUT US</h5>

            <h1 class="fw-bold mb-4">
                Our Story ✨
            </h1>

            <p class="text-muted">
                Star Shopping was created with one simple mission:
                to provide customers with high-quality products and
                an amazing shopping experience. We believe shopping
                should be easy, secure, and enjoyable for everyone.
            </p>

            <p class="text-muted">
                From fashion and electronics to daily essentials,
                we continuously work to bring the best products and
                services to our customers.
            </p>

        </div>

    </div>

</section>

<!-- Mission & Vision -->

<section class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold">🎯 Mission & Vision</h1>
        <p class="text-muted">
            We aim to deliver happiness through quality products.
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-6">

            <div class="p-5 shadow rounded-5 bg-white mission-card">

                <i class="fa-solid fa-bullseye text-danger fs-1"></i>

                <h2 class="mt-3">Our Mission</h2>

                <p class="text-muted">
                    To provide premium quality products with
                    affordable prices and excellent customer service.
                </p>

            </div>

        </div>


        <div class="col-md-6">

            <div class="p-5 shadow rounded-5 bg-white mission-card">

                <i class="fa-solid fa-eye text-primary fs-1"></i>

                <h2 class="mt-3">Our Vision</h2>

                <p class="text-muted">
                    To become the most trusted and loved
                    online shopping destination.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- Why Choose Us -->

<section class="container py-5">

<div class="text-center mb-5">
<h1 class="fw-bold">💎 Why Choose Us</h1>
</div>

<div class="row g-4">

<div class="col-md-3">

<div class="shadow p-4 rounded-5 text-center bg-white choose-card">

<i class="fa-solid fa-truck-fast fs-1 text-danger"></i>

<h4 class="mt-3">Fast Delivery</h4>

<p class="text-muted">
Quick and reliable delivery service.
</p>

</div>

</div>

<div class="col-md-3">

<div class="shadow p-4 rounded-5 text-center bg-white choose-card">

<i class="fa-solid fa-shield-halved fs-1 text-success"></i>

<h4 class="mt-3">Secure Payment</h4>

<p class="text-muted">
100% safe and secure payment.
</p>

</div>

</div>

<div class="col-md-3">

<div class="shadow p-4 rounded-5 text-center bg-white choose-card">

<i class="fa-solid fa-gem fs-1 text-primary"></i>

<h4 class="mt-3">Premium Quality</h4>

<p class="text-muted">
High-quality products guaranteed.
</p>

</div>

</div>

<div class="col-md-3">

<div class="shadow p-4 rounded-5 text-center bg-white choose-card">

<i class="fa-solid fa-headset fs-1 text-warning"></i>

<h4 class="mt-3">24/7 Support</h4>

<p class="text-muted">
Friendly customer support anytime.
</p>

</div>

</div>

</div>

</section>



<!-- Meet The Developer -->

<section class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold">👩‍💻 Meet The Developer</h1>
        <p class="text-muted">
            Passionate about creating beautiful and user-friendly experiences.
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-4">

            <div class="shadow-lg rounded-5 bg-white p-5 text-center developer-card">

                <img src="images/pooja.jpeg"
                     class="img-fluid rounded-circle shadow"
                     width="180"
                     height="180">

                <h3 class="mt-4 fw-bold">Sundavadra Pooja V.</h3>

                <h5 class="text-danger">
                    Full Stack Developer
                </h5>

                <p class="text-muted mt-3">
                    Creating modern and beautiful shopping experiences with passion and innovation. 💗✨
                </p>

                <div class="mt-4">

                    <i class="fa-brands fa-instagram fs-3 mx-2 text-danger"></i>

                    <i class="fa-brands fa-github fs-3 mx-2 text-dark"></i>

                    <i class="fa-brands fa-linkedin fs-3 mx-2 text-primary"></i>

                </div>

            </div>

        </div>

    </div>

</section>

<?php include("footer.php"); ?>

