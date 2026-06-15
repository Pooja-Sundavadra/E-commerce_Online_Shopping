<?php
include("config.php");

$category_query = mysqli_query($conn,"SELECT * FROM category");

$product_query = mysqli_query($conn,"
SELECT * FROM products
ORDER BY p_id DESC
LIMIT 8
");
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LuxeCart Premium White UI</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- AOS -->
<link rel="stylesheet"
href="https://unpkg.com/aos@2.3.4/dist/aos.css"/>

<!-- Swiper -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
scroll-behavior:smooth;
}

body{
background:#ffffff;
color:#111;
overflow-x:hidden;
}

/* Scrollbar */

::-webkit-scrollbar{
width:8px;
}

::-webkit-scrollbar-thumb{
background:linear-gradient(#ff008c,#7a00ff);
border-radius:20px;
}
.offcanvas{
width:300px;
}

.menu-link{
display:block;
padding:15px;
margin-bottom:10px;
border-radius:15px;
text-decoration:none;
color:#111;
font-weight:600;
transition:.3s;
}

.menu-link:hover{
background:#f5f5f5;
padding-left:25px;
color:#ff008c;
}

.offcanvas-header{
border-bottom:1px solid #eee;
}

.offcanvas-body{
padding:20px;
}
/* search */

.search-header{
    margin-top:95px; /* navbar ni niche */
    margin-bottom:20px;
}

.search-input{
    width:400px;
    height:50px;
    border:3px solid #000;
    border-radius:50px;
    padding:0 20px;
}

.search-btn{
    width:55px;
    height:50px;
    margin-left:10px;
    border:none;
    border-radius:50px;
    background:linear-gradient(45deg,#ff008c,#7a00ff);
    color:white;
}

/* Hero */

.hero{
min-height:100vh;
display:flex;
align-items:center;
position:relative;
overflow:hidden;
padding-top:120px;
}

.blur1{
width:350px;
height:350px;
background:#ff008c;
position:absolute;
border-radius:50%;
filter:blur(180px);
top:-100px;
left:-100px;
opacity:0.25;
}

.blur2{
width:350px;
height:350px;
background:#6f00ff;
position:absolute;
border-radius:50%;
filter:blur(180px);
bottom:-120px;
right:-100px;
opacity:0.25;
}

.hero h1{
font-size:85px;
font-weight:800;
line-height:95px;
}

.gradient-text{
background:linear-gradient(to right,#ff008c,#7a00ff);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}

.hero p{
margin-top:25px;
font-size:20px;
line-height:35px;
color:#555;
}

.hero-image{
position:relative;
animation:float 4s ease-in-out infinite;
}

.hero-image img{
width:100%;
border-radius:35px;
box-shadow:0 20px 80px rgba(255,0,140,0.18);
}

@keyframes float{
0%{transform:translateY(0px);}
50%{transform:translateY(-18px);}
100%{transform:translateY(0px);}
}

/* Stats */

.stats{
margin-top:50px;
display:flex;
gap:40px;
flex-wrap:wrap;
}

.stats h2{
font-size:40px;
font-weight:800;
}

.stats p{
margin:0;
color:#666;
}

/* Section */

section{
padding:100px 0;
}

.section-title{
font-size:60px;
font-weight:800;
margin-bottom:20px;
}

.section-sub{
color:#666;
max-width:700px;
margin:auto;
line-height:30px;
}

/* Category */

.category-card{
background:#fff;
border:1px solid #e9e9e9;
border-radius:35px;
padding:40px;
height:100%;
transition:0.4s;
position:relative;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.category-card::before{
content:'';
position:absolute;
width:150px;
height:150px;
background:#ff008c;
filter:blur(90px);
top:-50px;
right:-50px;
opacity:0;
transition:0.4s;
}

.category-card:hover::before{
opacity:0.3;
}

.category-card:hover{
transform:translateY(-10px);
box-shadow:0 15px 40px rgba(255,0,140,0.15);
}

.category-card i{
font-size:65px;
color:#ff008c;
}

.category-card h3{
margin-top:25px;
font-size:30px;
font-weight:700;
}

/* Products */

.product-card{
background:#fff;
border-radius:30px;
overflow:hidden;
transition:0.4s;
position:relative;
border:1px solid #eee;
box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.product-card:hover{
transform:translateY(-10px);
box-shadow:0 15px 40px rgba(255,0,140,0.15);
}

.product-card img{
width:100%;
height:350px;
object-fit:cover;
}

.product-info{
padding:25px;
}

.price{
color:#ff008c;
font-size:28px;
font-weight:700;
}

/* Banner */

.big-banner{
background:linear-gradient(45deg,#ff008c,#6a00ff);
border-radius:40px;
padding:80px 50px;
position:relative;
overflow:hidden;
color:white;
}

.big-banner::before{
content:'';
position:absolute;
width:400px;
height:400px;
background:white;
opacity:0.1;
border-radius:50%;
top:-180px;
right:-100px;
}

.big-banner h1{
font-size:70px;
font-weight:800;
}

/* Features */

.feature-box{
background:#fff;
padding:35px;
border-radius:30px;
text-align:center;
transition:0.4s;
height:100%;
border:1px solid #eee;
box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.feature-box:hover{
transform:translateY(-8px);
box-shadow:0 15px 40px rgba(255,0,140,0.15);
}

.feature-box i{
font-size:55px;
color:#ff008c;
}
/* trending products */

.product-info .d-flex{
    margin-top:15px;
}

.product-info .btn{
    padding:12px 0;
    font-weight:600;
}

.btn-main{
    display:flex;
    justify-content:center;
    align-items:center;
}

/* Testimonials */

.testimonial{
background:#fff;
padding:35px;
border-radius:30px;
height:100%;
border:1px solid #eee;
box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.testimonial img{
width:70px;
height:70px;
border-radius:50%;
object-fit:cover;
margin-bottom:20px;
}


/* Footer */

/* Footer */

footer{
padding:90px 0 30px;
background:linear-gradient(135deg,#ff008c,#7a00ff);
color:white;
position:relative;
overflow:hidden;
}

footer::before{
content:'';
position:absolute;
width:400px;
height:400px;
background:rgba(255,255,255,0.08);
border-radius:50%;
top:-150px;
right:-100px;
}

footer::after{
content:'';
position:absolute;
width:300px;
height:300px;
background:rgba(255,255,255,0.05);
border-radius:50%;
bottom:-120px;
left:-80px;
}

footer h2,
footer h5{
color:white;
font-weight:700;
}

.footer-links a{
display:block;
color:rgba(255,255,255,0.8);
text-decoration:none;
margin-top:15px;
transition:0.3s;
}

.footer-links a:hover{
color:white;
padding-left:5px;
}

footer p{
color:rgba(255,255,255,0.8) !important;
}

.social i{
font-size:24px;
margin-right:18px;
cursor:pointer;
transition:0.3s;
color:white;
}

.social i:hover{
transform:translateY(-5px) scale(1.1);
color:#ffd6f3;
}

footer hr{
border-color:rgba(255,255,255,0.2);
}

footer .gradient-text{
background:linear-gradient(to right,#ffffff,#ffe0f5);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}
/* Responsive */

@media(max-width:991px){

.hero h1{
font-size:55px;
line-height:70px;
}

.section-title{
font-size:45px;
}

.big-banner h1{
font-size:45px;
}

}

/* Brands */

.brands{
padding:70px 0;
border-top:1px solid rgba(0,0,0,0.05);
border-bottom:1px solid rgba(0,0,0,0.05);
background:#fff;
}

.brand-slider{
overflow:hidden;
white-space:nowrap;
}

.brand-track{
display:inline-block;
animation:scroll 18s linear infinite;
}

.brand-track span{
font-size:38px;
font-weight:700;
margin-right:100px;
color:#777;
}

@keyframes scroll{
0%{
transform:translateX(0);
}
100%{
transform:translateX(-50%);
}


.navbar-brand img{
    border-radius:50%;
    object-fit:cover;
}
}

</style>
</head>

<body>



<!-- Navbar -->

<!-- Navbar -->

<nav class="navbar navbar-light bg-white fixed-top shadow-sm">
<div class="container">

<a class="navbar-brand d-flex align-items-center" href="index.php">
    <img src="images/star.jpeg" width="50" height="50" class="rounded-circle me-2">
    <span>STAR</span>
</a>

<div class="d-flex align-items-center">

    <a href="view_cart.php" class="btn-main text-decoration-none me-3">
        🛒
    </a>

    <button class="btn border-0"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu">

        <i class="bi bi-list fs-1"></i>

    </button>

</div>

</div>
</nav>

<!-- Sidebar Menu -->

<div class="offcanvas offcanvas-start"
     tabindex="-1"
     id="sidebarMenu">

<div class="offcanvas-header">

<h4 class="fw-bold gradient-text">
🌟 STAR Menu
</h4>

<button type="button"
        class="btn-close"
        data-bs-dismiss="offcanvas">
</button>

</div>

<div class="offcanvas-body">

<a href="index.php" class="menu-link">
🏠 Home
</a>

<a href="pt.php" class="menu-link">
🛍 Products
</a>

<a href="collection.php" class="menu-link">
📦 Collections
</a>

<a href="review.php" class="menu-link">
⭐ Reviews
</a>

<a href="dy22.php" class="menu-link">
📞 Contact
</a>

<a href="login.php" class="menu-link">
🔐 Login
</a>

<hr>

<form action="search.php" method="GET">

<input type="text"
       name="search"
       class="form-control mb-3"
       placeholder="Search Product">

<button type="submit"
        class="btn-main w-100">
    Search
</button>

</form>

</div>

</div>





<!-- Hero -->

<section class="hero">

<div class="blur1"></div>
<div class="blur2"></div>

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6" data-aos="fade-right">

<h1>
Next Level <span class="gradient-text">
Luxury Shopping
</span>
Experience
</h1>

<p>
Premium futuristic ecommerce platform with luxury UI, exclusive collections, modern fashion, and real-time shopping experience.
</p>

<div class="mt-4 d-flex gap-3 flex-wrap">

<a href="pt.php" class="btn-main text-decoration-none">
Shop Now
</a>

<a href="#categories"
class="btn btn-outline-dark rounded-pill px-4 d-flex align-items-center">
View Collection
</a>

</div>

<div class="stats">

<div>
<h2>50K+</h2>
<p>Happy Customers</p>
</div>

<div>
<h2>10K+</h2>
<p>Luxury Products</p>
</div>

<div>
<h2>99%</h2>
<p>Positive Reviews</p>
</div>

</div>

</div>

<div class="col-lg-6" data-aos="fade-left">

<div class="hero-image">

<img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1200&auto=format&fit=crop">

</div>

</div>

</div>

</div>

</section>

<!-- Brands -->

<section class="brands">

<div class="brand-slider">

<div class="brand-track">

<span>NIKE</span>
<span>GUCCI</span>
<span>AMUL</span>
<span>ZARA</span>
<span>ADIDAS</span>
<span>PUMA</span>
<span>APPLE</span>
<span>ROLEX</span>
<span>PANTANJALI</span>
<span>NIKE</span>

</div>

</div>

</section>

<!-- Categories -->

<section id = "categories">

<div class="container">

<div class="text-center mb-5">

<h1 class="section-title">
Premium Categories
</h1>

<p class="section-sub">
Explore exclusive fashion, gadgets, luxury accessories, and premium collections.
</p>

</div>

<div class="row g-4">

<?php while($cat = mysqli_fetch_assoc($category_query)) { ?>

<div class="col-lg-3 col-md-6">

<a href="products.php?category_id=<?php echo $cat['id']; ?>"
class="text-decoration-none text-dark">

<div class="category-card">

<i class="<?php echo $cat['category_icon']; ?>"></i>

<h3><?php echo $cat['category_name']; ?></h3>

<p class="mt-3 text-muted">
Premium Collection
</p>

</div>

</a>

</div>

<?php } ?>

</div>
</section>

<!-- JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
AOS.init({
duration:1000
});
</script>



<!-- Trending Products -->

<section>

<div class="container">

<div class="text-center mb-5">

<h1 class="section-title">
Trending Products
</h1>

<p class="section-sub">
Discover our most loved premium products with luxury style and modern design.
</p>

</div>

<div class="swiper mySwiper">

<div class="swiper-wrapper">

<?php while($row = mysqli_fetch_assoc($product_query)) { ?>

<div class="swiper-slide">

    <div class="product-card">

        <img src="<?php echo $row['image']; ?>">

        <div class="product-info">

            <h4><?php echo $row['name']; ?></h4>

            <p class="price">
                ₹<?php echo number_format($row['price']); ?>
            </p>

            <div class="d-flex gap-2">

                <a href="cart.php?id=<?php echo $row['p_id']; ?>"
                   class="btn-main flex-fill text-center text-decoration-none">
                    Add To Cart
                </a>

                <a href="checkout.php?id=<?php echo $row['p_id']; ?>"
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

</div>

</section>

<!-- Footer -->

<footer>

<div class="container">

<div class="row">

<div class="col-lg-4">

<h2 class="gradient-text">
🌟STAR
</h2>

<p class="mt-4 text-muted">
Luxury ecommerce platform with futuristic design and premium shopping experience.
</p>

<div class="social mt-4">

<i class="bi bi-facebook"></i>
<i class="bi bi-instagram"></i>
<i class="bi bi-twitter-x"></i>
<i class="bi bi-youtube"></i>

</div>

</div>

<div class="col-lg-2">

<h5>
Company
</h5>

<div class="footer-links">

<a href="#">
About
</a>

<a href="#">
Careers
</a>

<a href="#">
Blog
</a>

</div>

</div>

<div class="col-lg-2">

<h5>
Support
</h5>

<div class="footer-links">

<a href="#">
Help Center
</a>

<a href="#">
Returns
</a>

<a href="#">
Privacy Policy
</a>

</div>

</div>

<div class="col-lg-4">

<h5>
Contact
</h5>

<p class="mt-4 text-muted">
support@luxecart.com
</p>

<p class="text-muted">
+91 98765 43210
</p>

</div>

</div>

<hr class="mt-5">

<p class="text-center text-muted mt-4">
© 2026 STAR Premium Shopping. All Rights Reserved.
</p>

</div>

</footer>

<script>

var swiper = new Swiper(".mySwiper", {

slidesPerView:3,
spaceBetween:30,
loop:true,

autoplay:{
delay:2500,
disableOnInteraction:false,
},

breakpoints:{

0:{
slidesPerView:1
},

768:{
slidesPerView:2
},

1200:{
slidesPerView:3
}

}

});



</script>
</body>
</html>