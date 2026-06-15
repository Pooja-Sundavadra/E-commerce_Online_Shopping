<?php
session_start();
include "config.php";

$msg = "";

if (!isset($_SESSION['code_verified'])) {
    header("Location: forgot_password.php");
    exit();
}

if (isset($_POST['submit'])) {

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {

        $msg = "Passwords do not match";

    } else {

        $email = $_SESSION['reset_email'];

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn,
            "UPDATE users
             SET password='$hash_password'
             WHERE email='$email'"
        );

        // Remove reset sessions
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_code']);
        unset($_SESSION['code_verified']);

        echo "<script>
                alert('Password Updated Successfully');
                window.location='login.php';
              </script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body{
    min-height:100vh;
    background:linear-gradient(135deg,#ff9a9e,#fad0c4,#c084fc);
}

.card{
    border:none;
    border-radius:30px;
    background:#fff;
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

h3{
    color:#9333ea;
    font-weight:700;
}

label{
    color:#9333ea;
    font-weight:600;
}

.form-control{
    border:2px solid #f3e8ff;
    border-radius:15px;
    padding:14px;
}

.form-control:focus{
    border-color:#d946ef;
    box-shadow:0 0 10px rgba(217,70,239,.3);
}

.btn-primary{
    background:linear-gradient(135deg,#ff4da6,#9333ea);
    border:none;
    border-radius:50px;
    padding:14px;
    font-weight:600;
    transition:.3s;
}

.btn-primary:hover{
    background:linear-gradient(135deg,#ec4899,#7e22ce);
    transform:translateY(-2px);
}

.alert-danger{
    background:#ffe4e6;
    color:#be123c;
    border:none;
    border-radius:15px;
}

.shadow{
    box-shadow:0 15px 40px rgba(0,0,0,.15)!important;
}
</style>
</head>
<body style="background:#f1f5f9;">

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="card p-4 shadow" style="max-width:450px;width:100%;">
        <h3 class="text-center mb-4">Create New Password</h3>

        <?php if(!empty($msg)){ ?>
            <div class="alert alert-danger">
                <?php echo $msg; ?>
            </div>
        <?php } ?>

        <form method="post">

            <div class="mb-3">
                <label>New Password</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password"
                       name="confirm_password"
                       class="form-control"
                       required>
            </div>

            <button type="submit"
                    name="submit"
                    class="btn btn-primary w-100">
                Update Password
            </button>

        </form>

    </div>

</div>

</body>
</html>