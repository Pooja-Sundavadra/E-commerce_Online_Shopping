<?php include("header.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<?php
include("config.php");

if(isset($_POST['submit_review']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $review = mysqli_real_escape_string($conn,$_POST['review']);

    mysqli_query($conn,"
    INSERT INTO reviews(name,email,review)
    VALUES('$name','$email','$review')
    ");
}

$reviews = mysqli_query($conn,"
SELECT * FROM reviews
ORDER BY r_id DESC
");
?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reviews - LuxeCart</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


<!-- AOS -->
<link rel="stylesheet"
href="https://unpkg.com/aos@2.3.4/dist/aos.css"/>

<!-- Swiper -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

<style>

    <link rel="stylesheet" href="css/style.css">

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f7f7f7;
overflow-x:hidden;
}

/* Navbar */

.navbar{
background:white;
padding:18px 0;
box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.navbar-brand{
font-size:34px;
font-weight:800;
background:linear-gradient(to right,#ff008c,#7a00ff);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}

/* Hero */

.hero{
padding:120px 0 80px;
text-align:center;
background:linear-gradient(135deg,#ff008c,#7a00ff);
color:white;
border-bottom-left-radius:60px;
border-bottom-right-radius:60px;
}

.hero h1{
font-size:70px;
font-weight:800;
}

.hero p{
margin-top:20px;
font-size:20px;
opacity:0.9;
}

/* Stats */

.stats{
margin-top:-60px;
}

.stat-box{
background:white;
padding:35px;
border-radius:30px;
text-align:center;
box-shadow:0 10px 40px rgba(0,0,0,0.08);
height:100%;
}

.stat-box i{
font-size:55px;
color:#ff008c;
}

.stat-box h2{
margin-top:20px;
font-size:40px;
font-weight:800;
}

/* Trust Section */

.trust-section{
padding:100px 0;
}

.section-title{
text-align:center;
font-size:55px;
font-weight:800;
margin-bottom:20px;
}

.section-sub{
text-align:center;
color:#666;
max-width:700px;
margin:auto;
margin-bottom:60px;
}

.trust-card{
background:white;
padding:40px;
border-radius:30px;
text-align:center;
height:100%;
transition:0.4s;
box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

.trust-card:hover{
transform:translateY(-10px);
box-shadow:0 15px 40px rgba(255,0,140,0.15);
}

.trust-card i{
font-size:60px;
color:#ff008c;
}

.trust-card h3{
margin-top:25px;
font-weight:700;
}

/* Reviews */

.review-card{
background:white;
padding:35px;
border-radius:30px;
height:100%;
box-shadow:0 10px 30px rgba(0,0,0,0.06);
transition:0.4s;
}

.review-card:hover{
transform:translateY(-10px);
}

.review-card img{
width:80px;
height:80px;
border-radius:50%;
object-fit:cover;
margin-bottom:20px;
}

.stars{
color:#ffb400;
font-size:20px;
margin:10px 0;
}

/* Security Banner */

.security-banner{
background:linear-gradient(135deg,#ff008c,#7a00ff);
padding:80px 40px;
border-radius:40px;
text-align:center;
color:white;
margin-top:80px;
}

.security-banner h1{
font-size:55px;
font-weight:800;
}

.security-banner p{
margin-top:20px;
font-size:20px;
}

/* Form */

.review-form{
padding:100px 0;
}

.form-box{
background:white;
padding:50px;
border-radius:35px;
box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

.form-control{
height:60px;
border-radius:20px;
margin-bottom:20px;
}

textarea.form-control{
height:150px;
resize:none;
padding-top:20px;
}

.btn-main{
background:linear-gradient(45deg,#ff008c,#7a00ff);
border:none;
padding:14px 35px;
border-radius:50px;
color:white;
font-weight:600;
}

/* Footer */

/* Responsive */

@media(max-width:991px){

.hero h1{
font-size:45px;
}

.section-title{
font-size:40px;
}

.security-banner h1{
font-size:38px;
}

}



</style>

</head>

<body>

<!-- Navbar -->


</section>

<!-- Stats -->

<section class="stats">

<div class="container">

<div class="row g-4">

<div class="col-lg-4">

<div class="stat-box">

<i class="bi bi-people-fill"></i>

<h2>50K+</h2>

<p>
Happy Customers
</p>

</div>

</div>

<div class="col-lg-4">

<div class="stat-box">

<i class="bi bi-star-fill"></i>

<h2>99%</h2>

<p>
Positive Reviews
</p>

</div>

</div>

<div class="col-lg-4">

<div class="stat-box">

<i class="bi bi-shield-lock-fill"></i>

<h2>100%</h2>

<p>
Secure Payments
</p>

</div>

</div>

</div>

</div>

</section>

<!-- Trust Features -->

<section class="trust-section">

<div class="container">

<h1 class="section-title">
Why Customers Trust Us
</h1>

<p class="section-sub">
LuxeCart provides premium quality products with secure shopping experience and trusted delivery services.
</p>

<div class="row g-4">

<div class="col-lg-3 col-md-6">

<div class="trust-card">

<i class="bi bi-shield-check"></i>

<h3>Secure Checkout</h3>

<p class="mt-3 text-muted">
256-bit encrypted payment security.
</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="trust-card">

<i class="bi bi-box-seam"></i>

<h3>Premium Packaging</h3>

<p class="mt-3 text-muted">
Luxury packaging with product safety.
</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="trust-card">

<i class="bi bi-truck"></i>

<h3>Fast Delivery</h3>

<p class="mt-3 text-muted">
Quick and trusted shipping service.
</p>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="trust-card">

<i class="bi bi-arrow-repeat"></i>

<h3>Easy Returns</h3>

<p class="mt-3 text-muted">
7-day easy return and refund policy.
</p>

</div>

</div>

</div>

</div>

</section>

<!-- Reviews -->

<section>

<div class="container">

<h1 class="section-title">
Customer Reviews
</h1>

<p class="section-sub">
See what our customers say about LuxeCart.
</p>


<div class="row g-4">

<?php
while($row = mysqli_fetch_assoc($reviews))
{
?>

<div class="col-lg-4">

<div class="review-card">

<img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">

<h4>
<?php echo htmlspecialchars($row['name']); ?>
</h4>

<div class="stars">
⭐⭐⭐⭐⭐
</div>

<p class="text-muted">
<?php echo htmlspecialchars($row['review']); ?>
</p>

</div>

</div>

<?php
}
?>

</div>
</div>

<!-- Security Banner -->

<div class="security-banner">

<h1>
100% Trusted & Secure ❤️
</h1>

<p>
Your privacy, payments, and shopping experience are fully protected with LuxeCart.
</p>

<div class="mt-4">

<a href="pt.php">
<button class="btn btn-light rounded-pill px-5 py-3 fw-bold">
Start Shopping
</button>
</a>

</div>

</div>

</div>

</section>

<!-- Review Form -->

<section class="review-form">

<div class="container">

<div class="form-box">

<h1 class="section-title">
Share Your Experience
</h1>

<p class="section-sub">
Your feedback helps us improve our service.
</p>

<form method="POST">

<input type="text"
name="name"
class="form-control"
placeholder="Your Name"
required>

<input type="email"
name="email"
class="form-control"
placeholder="Your Email"
required>

<textarea
name="review"
class="form-control"
placeholder="Write your review..."
required></textarea>

<button
type="submit"
name="submit_review"
class="btn-main">
Submit Review
</button>

</form>

</div>

</div>

</section>

<!-- Footer -->
<?php include("footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>