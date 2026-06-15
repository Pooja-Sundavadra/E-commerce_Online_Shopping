<?php
include("config.php");

$category_query = mysqli_query($conn,"SELECT * FROM category");

$product_query = mysqli_query($conn,"
SELECT * FROM products
ORDER BY p_id DESC
LIMIT 8
");
?>



<?php include("header.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

        
               

</a>

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

</div>

</section>

<!-- Footer -->

<?php include("footer.php"); ?>