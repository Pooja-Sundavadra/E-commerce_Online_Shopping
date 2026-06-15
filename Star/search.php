<?php include("header.php"); ?>
<?php
include("config.php");

$search = "";

if(isset($_GET['search']))
{
    $search = mysqli_real_escape_string($conn,$_GET['search']);
}

$query = mysqli_query($conn,"
SELECT * FROM products
WHERE name LIKE '%$search%'
OR description LIKE '%$search%'
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Products</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
}

.card img{
    object-fit:cover;
}

.add-cart-btn{
    background:linear-gradient(135deg,#7b2ff7,#f107a3);
    color:white;
    border:none;
}

.add-cart-btn:hover{
    color:white;
    opacity:.9;
}

.buy-btn{
    background:black;
    color:white;
    border:none;
}

.buy-btn:hover{
    background:#222;
    color:white;
}
</style>
</head>
<body>

<div class="container mt-5">

<h2 class="mb-4">
Search Result For :
"<?php echo $search; ?>"
</h2>

<div class="row">

<?php

if(mysqli_num_rows($query)>0)
{
    while($row = mysqli_fetch_assoc($query))
    {
?>

<div class="col-md-3 mb-4">

<div class="card h-100">

<img src="<?php echo $row['image']; ?>"
     class="card-img-top"
     height="250">

<div class="card-body">

<h5>
<?php echo $row['name']; ?>
</h5>

<h6>
₹<?php echo number_format($row['price']); ?>
</h6>

<div class="d-flex gap-2 mt-3">

<a href="cart.php?id=<?php echo $row['p_id']; ?>"
   class="btn add-cart-btn">
   Add To Cart
</a>

<a href="checkout.php?p_id=<?php echo $row['p_id']; ?>"
   class="btn buy-btn">
   Buy Now
</a>

</div>

</div>

</div>

</div>

<?php
    }
}
else
{
    echo "<h4>No Product Found</h4>";
}
?>

</div>

</div>

<?php include("footer.php"); ?>

</body>
</html>