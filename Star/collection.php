<?php include("header.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
include("config.php");

$category_query = mysqli_query($conn,"SELECT * FROM category");

$product_query = mysqli_query($conn,"
SELECT * FROM products
ORDER BY p_id DESC
LIMIT 8
");
?>

<!-- Categories -->

<section id = "categories">

<div class="container">

<div class="text-center mb-5">

<h1 class="section-title"><br>
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

<?php include("footer.php"); ?>