<?php
session_start();

$msg = "";

if (!isset($_SESSION['reset_email']) || !isset($_SESSION['reset_code'])) {
    header("Location: forgot_password.php");
    exit();
}

$email = $_SESSION['reset_email'];

if (isset($_POST['submit'])) {

    $code = trim($_POST['code']);

    if ($code == $_SESSION['reset_code']) {

        $_SESSION['code_verified'] = true;

        header("Location: new_password.php");
        exit();

    } else {

        $msg = "Invalid Verification Code";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify Code</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
   body{
    min-height:100vh;
    background:linear-gradient(135deg,#ff9a9e,#fad0c4,#c084fc);
}

.auth-card{
    border:none;
    border-radius:30px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

.card-header{
    background:linear-gradient(135deg,#ff4da6,#9333ea);
    color:white;
    text-align:center;
    padding:30px;
    border:none !important;
}

.card-header h3{
    margin:0;
    font-weight:700;
}

.card-body{
    background:white;
}

.form-control{
    border:2px solid #f3e8ff;
    border-radius:15px;
    padding:15px;
    font-size:20px;
}

.form-control:focus{
    border-color:#d946ef;
    box-shadow:0 0 10px rgba(217,70,239,.3);
}

.btn-auth{
    background:linear-gradient(135deg,#ff4da6,#9333ea);
    border:none;
    border-radius:50px;
    padding:14px;
    font-size:17px;
    font-weight:600;
    transition:.3s;
}

.btn-auth:hover{
    background:linear-gradient(135deg,#ec4899,#7e22ce);
    transform:translateY(-2px);
}

.letter-spacing{
    letter-spacing:10px;
}

.alert-success{
    background:#f3e8ff;
    color:#7e22ce;
    border:none;
    border-radius:15px;
}

.alert-danger{
    background:#ffe4e6;
    color:#be123c;
    border:none;
    border-radius:15px;
}

a{
    color:#9333ea;
    font-weight:600;
    text-decoration:none;
}

a:hover{
    color:#ec4899;
}
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">

<div class="card auth-card w-100" style="max-width:450px;">

<div class="card-header">
<h3>Verify Code</h3>
</div>

<div class="card-body p-4">

<?php if($msg!=""){ ?>

<div class="alert alert-danger">
<?php echo $msg; ?>
</div>

<?php } ?>

<div class="alert alert-success">
Code sent to <b><?php echo htmlspecialchars($email); ?></b>
</div>

<form method="post">

<div class="mb-3">
<label>Enter 6-Digit Verification Code</label>

<input type="text"
name="code"
maxlength="6"
class="form-control text-center fw-bold letter-spacing"
placeholder="------"
required>

</div>

<button type="submit"
name="submit"
class="btn btn-auth text-white w-100">
Verify Code
</button>

<div class="text-center mt-3">
<a href="forgot_password.php">Resend Code</a>
</div>

</form>

</div>
</div>
</div>

</body>
</html>