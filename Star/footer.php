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
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
AOS.init({
    duration:1000
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView:3,
    spaceBetween:30,
    loop:true,

    autoplay:{
        delay:2500,
        disableOnInteraction:false,
    },

    breakpoints:{
        0:{ slidesPerView:1 },
        768:{ slidesPerView:2 },
        1200:{ slidesPerView:3 }
    }
});
</script>

</body>
</html>
