<?php
include("config.php");

$msg = "";

if(isset($_POST['register']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $msg = "❌ Email already exists!";
    }
    else
    {
        mysqli_query($conn,"INSERT INTO users(name,email,password)
        VALUES('$name','$email','$password')");

        $msg = "✅ Registration Successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>STAR Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#ff008c,#7a00ff);
    overflow:hidden;
}

/* Blur Effect */

.blur1{
    position:absolute;
    width:300px;
    height:300px;
    background:#ff008c;
    border-radius:50%;
    filter:blur(150px);
    top:-100px;
    left:-100px;
    opacity:.4;
}

.blur2{
    position:absolute;
    width:300px;
    height:300px;
    background:#7a00ff;
    border-radius:50%;
    filter:blur(150px);
    bottom:-100px;
    right:-100px;
    opacity:.4;
}

/* Register Box */

.register-box{
    background:#fff;
    padding:40px;
    border-radius:30px;
    box-shadow:0 20px 60px rgba(0,0,0,.15);
    position:relative;
    z-index:10;
}

.logo{
    text-align:center;
    font-size:42px;
    font-weight:800;
    margin-bottom:10px;
    background:linear-gradient(to right,#ff008c,#7a00ff);
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.subtitle{
    text-align:center;
    color:#666;
    margin-bottom:25px;
}

.form-control{
    height:55px;
    border-radius:15px;
    border:1px solid #ddd;
}

.form-control:focus{
    border-color:#ff008c;
    box-shadow:none;
}

.btn-register{
    width:100%;
    height:55px;
    border:none;
    border-radius:50px;
    background:linear-gradient(45deg,#ff008c,#7a00ff);
    color:white;
    font-weight:600;
    transition:.3s;
}

.btn-register:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 30px rgba(255,0,140,.3);
}

.btn-login{
    width:100%;
    border-radius:50px;
    padding:12px;
    font-weight:600;
}

.alert{
    border-radius:15px;
}

.login-link{
    text-decoration:none;
    color:#7a00ff;
    font-weight:600;
}

.login-link:hover{
    color:#ff008c;
}

</style>

</head>
<body>

<div class="blur1"></div>
<div class="blur2"></div>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">

<div class="register-box">

<div class="logo">
🌟 STAR
</div>

<p class="subtitle">
Create Your Account
</p>

<?php if($msg!=""){ ?>
<div class="alert alert-info">
    <?php echo $msg; ?>
</div>
<?php } ?>

<form method="POST">

<input type="text"
name="name"
class="form-control mb-3"
placeholder="Enter Full Name"
required>

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Enter Email Address"
required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Create Password"
required>

<button type="submit"
name="register"
class="btn-register">
Register
</button>

</form>

<p class="text-center mt-4">
Already have an account?
<a href="login.php" class="login-link">
Login
</a>
</p>

<a href="login.php" class="btn btn-success btn-login mt-2">
Go To Login
</a>

</div>

</div>
</div>
</div>

</body>
</html>