

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>STAR Shopping</title>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css"/>

<!-- Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- Custom CSS -->
<link rel="stylesheet" href="style.css">



</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="images/star.jpeg" width="50" height="50"
                 class="rounded-circle me-2">
            <span>STAR</span>
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">

            <!-- Search -->
            <form action="search.php" method="GET" class="d-flex">
                <input type="text"
                       name="search"
                       class="form-control rounded-pill"
                       placeholder="Search..."
                       style="width:180px;">

                <button type="submit" class="btn-main ms-2">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <!-- Cart -->
            <a href="view_cart.php"
               class="btn-main text-decoration-none">
                <i class="bi bi-cart3"></i>
            </a>

            <!-- Wishlist -->
<div class="dropdown">

    <a href="#" class="btn-main text-decoration-none dropdown-toggle"
       data-bs-toggle="dropdown">

        <i class="bi bi-person-circle profile-icon"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">

        <li>
            <a class="dropdown-item" href="profile.php">
                👤 My Profile
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="order_history.php">
                🕒 Order History
            </a>
        </li>


        <li><hr class="dropdown-divider"></li>

        <li>
            <a class="dropdown-item text-danger" href="logout.php">
                🚪 Logout
            </a>
        </li>

    </ul>

</div>
            

            <!-- Menu Button -->
            <button class="btn-main"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#menuCanvas">

                <i class="bi bi-list"></i>

            </button>



        </div>

    </div>
</nav>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="menuCanvas">

    <div class="offcanvas-header">
        <h4 class="fw-bold">🌟 STAR</h4>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="offcanvas">
        </button>
    </div>

    <div class="offcanvas-body">

        <ul class="navbar-nav">

            <li class="nav-item mb-3">
                <a class="nav-link" href="index.php">🏠 Home</a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link" href="pt.php">🛍 Products</a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link" href="collection.php">📦 Collection</a>
            </li>

            <li class="nav-item mb-3">
                <a class="nav-link" href="about.php">ℹ About Us</a>
            </li>


            <li class="nav-item mb-3">
                <a class="nav-link" href="review.php">⭐ Reviews</a>
            </li>

            



            <li class="nav-item mb-3">
                <a class="nav-link" href="contacts.php">📞 Contact</a>
            </li>

        </ul>

    </div>

</div>
