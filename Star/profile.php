<?php
session_start();
include("config.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$q = mysqli_query($conn,"
SELECT 
    u.name,
    u.email,
    c.contact,
    c.address
FROM users u
LEFT JOIN checkout c ON u.user_id = c.id
WHERE u.user_id='$user_id'
ORDER BY c.id DESC
LIMIT 1
");

$user = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(135deg,#667eea,#764ba2);
min-height:100vh;
}

.profile-card{
max-width:800px;
margin:auto;
margin-top:50px;
background:white;
padding:40px;
border-radius:25px;
box-shadow:0 10px 30px rgba(0,0,0,.2);
}

.profile-img{
width:120px;
height:120px;
border-radius:50%;
background:#eee;
display:flex;
align-items:center;
justify-content:center;
font-size:50px;
margin:auto;
}

.info{
padding:15px;
background:#f8f9fa;
border-radius:15px;
margin-top:15px;
}

.btn-custom{
background:#6f42c1;
color:white;
border:none;
padding:12px 25px;
border-radius:50px;
}

.btn-custom:hover{
background:#5a32a3;
color:white;
}

</style>
</head>

<body>

<div class="profile-card">

<div class="text-center">

<div class="profile-img">
👤
</div>

<!-- NAME -->
<p class="text-muted">
@<?= $user['name'] ?>
</p>

<!-- EMAIL -->
<div class="info">
<b>Email :</b>
<?= $user['email'] ?>
</div>

<!-- CONTACT -->
<div class="info">
<b>Contact :</b>
<?= $user['contact'] ?>
</div>

<!-- ADDRESS -->
<div class="info">
<b>Address :</b>
<?= $user['address'] ?>
</div>

</div>

<div class="text-center mt-4">



</div>

</div>

</body>
</html>