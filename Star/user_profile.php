<?php
session_start();
include("config.php");

// Example: user data fetch (adjust table name as per your DB)
$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$user_id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Profile</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#74ebd5,#ACB6E5);
    font-family: Arial;
}

.profile-card{
    max-width: 800px;
    margin: 60px auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    overflow: hidden;
}

.profile-header{
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    color: white;
    padding: 30px;
    text-align: center;
}

.profile-header img{
    width: 110px;
    height: 110px;
    border-radius: 50%;
    border: 4px solid white;
    object-fit: cover;
}

.profile-body{
    padding: 30px;
}

.info-box{
    background: #f8f9fa;
    padding: 12px 15px;
    border-radius: 10px;
    margin-bottom: 12px;
    border-left: 4px solid #0d6efd;
}

.label{
    font-weight: bold;
    color: #555;
}

.value{
    float: right;
    color: #000;
}
</style>

</head>

<body>

<div class="profile-card">

    <!-- HEADER -->
    <div class="profile-header">
        <img src="uploads/<?php echo $user['profile_pic']; ?>" alt="Profile">
        <h3 class="mt-3"><?php echo $user['name']; ?></h3>
        <p><?php echo $user['email']; ?></p>
    </div>

    <!-- BODY -->
    <div class="profile-body">

        <div class="info-box">
            <span class="label">📞 Mobile</span>
            <span class="value"><?php echo $user['mobile']; ?></span>
        </div>

        <div class="info-box">
            <span class="label">📍 Address</span>
            <span class="value"><?php echo $user['address']; ?></span>
        </div>

        <div class="info-box">
            <span class="label">🏙 City</span>
            <span class="value"><?php echo $user['city']; ?></span>
        </div>

        <div class="info-box">
            <span class="label">📮 Pincode</span>
            <span class="value"><?php echo $user['pincode']; ?></span>
        </div>

        <div class="info-box">
            <span class="label">👤 Username</span>
            <span class="value"><?php echo $user['username']; ?></span>
        </div>

        <a href="edit_profile.php" class="btn btn-primary w-100 mt-3">
            ✏ Edit Profile
        </a>

    </div>
</div>

</body>
</html>