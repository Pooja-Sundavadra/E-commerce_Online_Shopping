<?php
session_start();
include("config.php");

require('fpdf.php');
require(__DIR__ . "/../phpqrcode/qrlib.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$key_id = "rzp_live_xxx";
$key_secret = "xxx";

$api = new Api($key_id, $key_secret);

/* =========================
   GET DATA FROM RAZORPAY
========================= */

$payment_id = $_POST['razorpay_payment_id'] ?? '';
$order_id   = $_POST['razorpay_order_id'] ?? '';
$signature  = $_POST['razorpay_signature'] ?? '';

if(!$payment_id || !$order_id || !$signature){
    header("Location: fail.php?error=Invalid Payment Data");
    exit;
}

/* =========================
   VERIFY PAYMENT
========================= */

try {

    $api->utility->verifyPaymentSignature([
        'razorpay_order_id' => $order_id,
        'razorpay_payment_id' => $payment_id,
        'razorpay_signature' => $signature
    ]);

    /* =========================
       UPDATE DATABASE
    ========================== */

    mysqli_query($conn,"
        UPDATE checkout 
        SET status='paid',
            razorpay_payment_id='$payment_id'
        WHERE razorpay_order_id='$order_id'
    ");

    /* =========================
       FETCH ORDER DETAILS
    ========================== */

    $q = mysqli_query($conn,"
        SELECT c.*, p.name AS product_name
        FROM checkout c
        JOIN products p ON c.p_id = p.p_id
        WHERE c.razorpay_order_id='$order_id'
    ");

    $order = mysqli_fetch_assoc($q);

    if(!$order){
        die("Order not found");
    }

    /* =========================
       QR CODE GENERATION
    ========================== */

    if (!is_dir("qr_images")) {
        mkdir("qr_images");
    }

    $qrfile = "qr_images/".$order_id.".png";

    $qr_text =
"STAR SHOPPING RECEIPT
-----------------------
Order ID: $order_id
Payment ID: $payment_id
Customer: ".$order['name']."
Product: ".$order['product_name']."
Amount: ₹".$order['amount']."
Status: PAID";

    QRcode::png($qr_text, $qrfile, QR_ECLEVEL_L, 6);

    /* =========================
       PDF GENERATION
    ========================== */

    ob_clean();

    $pdf = new FPDF();
    $pdf->AddPage();

    /* HEADER DESIGN */
    $pdf->SetFillColor(123, 47, 247);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,12,"PAYMENT SUCCESS RECEIPT",0,1,"C",true);

    $pdf->Ln(10);

    /* RESET */
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',12);

    /* DETAILS */
    $pdf->Cell(60,10,"Order ID:",0,0);
    $pdf->Cell(100,10,$order_id,0,1);

    $pdf->Cell(60,10,"Payment ID:",0,0);
    $pdf->Cell(100,10,$payment_id,0,1);

    $pdf->Cell(60,10,"Customer Name:",0,0);
    $pdf->Cell(100,10,$order['name'],0,1);

    $pdf->Cell(60,10,"Contact:",0,0);
    $pdf->Cell(100,10,$order['contact'],0,1);

    $pdf->Cell(60,10,"Product:",0,0);
    $pdf->Cell(100,10,$order['product_name'],0,1);

    $pdf->Cell(60,10,"Amount:",0,0);
    $pdf->Cell(100,10,"Rs. ".$order['amount'],0,1);

    $pdf->Cell(60,10,"Status:",0,0);
    $pdf->Cell(100,10,"PAID",0,1);

    $pdf->Ln(8);

    /* QR */
    $pdf->Cell(190,10,"Scan QR Code:",0,1,"C");
    $pdf->Image($qrfile,75,120,60,60);

    /* FOOTER */
    $pdf->SetY(-40);
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(190,10,"Thank You For Shopping ❤️",0,1,"C");

    $pdf->Output("I","receipt_$order_id.pdf");

    exit;

} catch(SignatureVerificationError $e){

    mysqli_query($conn,"
        UPDATE checkout 
        SET status='failed'
        WHERE razorpay_order_id='$order_id'
    ");

    header("Location: fail.php?error=Payment Verification Failed");
    exit;
}
?>