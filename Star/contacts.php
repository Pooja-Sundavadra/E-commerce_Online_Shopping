<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us - LuxeCart</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

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



/* Hero */

.hero{
padding:120px 0 90px;
background:linear-gradient(135deg,#ff008c,#7a00ff);
text-align:center;
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

/* Contact Cards */

.contact-section{
padding:100px 0;
}

.contact-card{
background:white;
padding:40px;
border-radius:30px;
text-align:center;
height:100%;
transition:0.4s;
box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

.contact-card:hover{
transform:translateY(-10px);
box-shadow:0 15px 40px rgba(255,0,140,0.15);
}

.contact-card i{
font-size:60px;
color:#ff008c;
}

.contact-card h3{
margin-top:25px;
font-weight:700;
}

/* Form */

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
border:1px solid #ddd;
}

textarea.form-control{
height:160px;
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
transition:0.3s;
}

.btn-main:hover{
transform:translateY(-5px);
box-shadow:0 10px 30px rgba(255,0,140,0.25);
}

/* Section Title */

.section-title{
font-size:55px;
font-weight:800;
margin-bottom:20px;
text-align:center;
}

.section-sub{
text-align:center;
color:#666;
margin-bottom:60px;
}

/* FAQ */

.faq-section{
padding:100px 0;
}

.accordion-item{
border:none;
margin-bottom:20px;
border-radius:20px !important;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,0.05);
}

.accordion-button{
padding:25px;
font-weight:600;
font-size:18px;
}

.accordion-button:not(.collapsed){
background:linear-gradient(45deg,#ff008c,#7a00ff);
color:white;
}

/* Map */

.map-box{
border-radius:35px;
overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
margin-top:70px;
}

.map-box iframe{
width:100%;
height:450px;
border:0;
}


/* Responsive */

@media(max-width:991px){

.hero h1{
font-size:45px;
}

.section-title{
font-size:38px;
}

}

</style>

</head>

<body>



<!-- Hero -->

<section class="hero">

<div class="container">

<h1>
Contact LuxeCart ❤️
</h1>

<p>
We’d love to hear from you. Contact us anytime for support, help, or inquiries.
</p>

</div>

</section>

<!-- Contact Info -->

<section class="contact-section">

<div class="container">

<h1 class="section-title">
Get In Touch
</h1>

<p class="section-sub">
Our support team is available for your help and guidance.
</p>

<div class="row g-4">

<div class="col-lg-4">

<div class="contact-card">

<i class="bi bi-telephone-fill"></i>

<h3>Phone Support</h3>

<p class="mt-3 text-muted">
+91 98765 43210
</p>

</div>

</div>

<div class="col-lg-4">

<div class="contact-card">

<i class="bi bi-envelope-fill"></i>

<h3>Email Address</h3>

<p class="mt-3 text-muted">
support@luxecart.com
</p>

</div>

</div>

<div class="col-lg-4">

<div class="contact-card">

<i class="bi bi-geo-alt-fill"></i>

<h3>Office Address</h3>

<p class="mt-3 text-muted">
Porbandar, Gujarat, India
</p>

</div>

</div>

</div>

<!-- Contact Form -->

<div class="row mt-5 justify-content-center">

<div class="col-lg-8">

<div class="form-box">

<h2 class="mb-4 text-center fw-bold">
Send Message ✨
</h2>

<form>

<input type="text"
class="form-control"
placeholder="Your Name">

<input type="email"
class="form-control"
placeholder="Your Email">

<input type="text"
class="form-control"
placeholder="Subject">

<textarea class="form-control"
placeholder="Write your message..."></textarea>

<div class="text-center mt-4">

<button class="btn-main">
Send Message
</button>

</div>

</form>

</div>

</div>

</div>

<!-- Google Map -->

<div class="map-box">

<iframe
src="https://www.google.com/maps?q=Porbandar,Gujarat&output=embed">
</iframe>

</div>

</div>

</section>

<!-- FAQ -->

<section class="faq-section">

<div class="container">

<h1 class="section-title">
Frequently Asked Questions
</h1>

<p class="section-sub">
Quick answers to common customer questions.
</p>

<div class="accordion" id="faqAccordion">

<!-- FAQ 1 -->

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq1">

Is payment secure?

</button>

</h2>

<div id="faq1"
class="accordion-collapse collapse show"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Yes, all payments are protected with secure encryption technology.

</div>

</div>

</div>

<!-- FAQ 2 -->

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button collapsed"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq2">

How long does delivery take?

</button>

</h2>

<div id="faq2"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Delivery usually takes 3-7 working days depending on your location.

</div>

</div>

</div>

<!-- FAQ 3 -->

<div class="accordion-item">

<h2 class="accordion-header">

<button class="accordion-button collapsed"
type="button"
data-bs-toggle="collapse"
data-bs-target="#faq3">

Do you offer returns?

</button>

</h2>

<div id="faq3"
class="accordion-collapse collapse"
data-bs-parent="#faqAccordion">

<div class="accordion-body">

Yes, we provide easy 7-day returns and refund support.

</div>

</div>

</div>

</div>

</div>

</section>


</body>
</html>
<?php include("footer.php"); ?>