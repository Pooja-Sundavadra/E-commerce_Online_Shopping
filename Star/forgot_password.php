<?php
session_start();
include "config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

$msg = "";

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $sql = "SELECT user_id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $code = rand(100000, 999999);
        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'vaghelanidhi194@gmail.com';
        $mail->Password = 'zxht srda idie dlux';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('vaghelanidhi194@gmail.com', 'STAR Shopping');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your Password Reset Verification Code';
            $mail->Body    = "
                <h2>Verification Code</h2>
                <p>Hello,</p>
                <p>You requested to reset your password. Here is your 6-digit verification code:</p>
                <h3 style='background:#f1f5f9;padding:10px;display:inline-block;'>$code</h3>
                <p>If you did not request this, please ignore this email.</p>
            ";

            $mail->send();
            
            // Set session variables
            $_SESSION['reset_email'] = $email;
            $_SESSION['reset_code'] = $code;
            
            header("Location: verify.php");
            exit();
        } catch (Exception $e) {
            $msg = "Error: Code could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $msg = "Error: Email not found in our records.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    body{
    min-height:100vh;
    background: linear-gradient(135deg,#ff9a9e,#fad0c4,#c084fc);
}

.auth-card{
    border:none;
    border-radius:30px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

.card-header{
    background:linear-gradient(135deg,#ff4da6,#a855f7);
    color:white;
    text-align:center;
    padding:30px;
    border:none !important;
}

.card-header h3{
    font-weight:700;
    margin:0;
}

.card-body{
    background:white;
}

.form-label{
    color:#7c3aed;
    font-weight:600;
}

.form-control{
    border-radius:15px;
    border:2px solid #f3e8ff;
    padding:14px;
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
    font-size:18px;
    font-weight:600;
    transition:.3s;
}

.btn-auth:hover{
    background:linear-gradient(135deg,#ec4899,#7e22ce);
    transform:translateY(-2px);
}

.error-msg{
    background:#ffe4e6;
    color:#be123c;
    border:none;
}

.success-msg{
    background:#f3e8ff;
    color:#7e22ce;
    border:none;
}

a{
    color:#a855f7;
    font-weight:600;
}

a:hover{
    color:#ec4899;
}
</style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card auth-card w-100" style="max-width: 450px;">
        <div class="card-header">
            <h3 class="mb-0">Forgot Password</h3>
        </div>
        <div class="card-body p-4 p-md-5">
            <?php if(!empty($msg)): ?>
                <div class="alert error-msg p-3 mb-4 rounded"><?php echo $msg; ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="mb-4">
                    <label class="form-label fw-medium text-secondary">Enter your registered email address</label>
                    <input type="email" name="email" class="form-control form-control-lg" placeholder="name@example.com" required>
                </div>
                
                <button type="submit" name="submit" class="btn btn-auth w-100 text-white btn-lg mt-2 shadow-sm rounded-pill">
                    Send Verification Code
                </button>

                <div class="text-center mt-3">
                    <a href="login.php" class="text-decoration-none">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
