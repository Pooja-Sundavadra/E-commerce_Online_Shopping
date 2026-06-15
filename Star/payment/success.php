<?php
require('vendor/autoload.php');
require(__DIR__ . "/../fpdf19/fpdf.php");
require(__DIR__ . "/../phpqrcode/qrlib.php");

include("../config.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$key_id = "rzp_live_T0E03YO2u78Pfu";
$key_secret = "IxFXhxbSWSxuk11XiV1eBUoX";

/* =======================
   GET RAZORPAY RESPONSE
======================= */
$payment_id = $_POST['razorpay_payment_id'] ?? '';
$order_id   = $_POST['razorpay_order_id'] ?? '';
$signature  = $_POST['razorpay_signature'] ?? '';

if(!$payment_id || !$order_id || !$signature){
    die("Invalid Payment Data");
}

/* =======================
   VERIFY PAYMENT
======================= */
$api = new Api($key_id, $key_secret);

try {
    $api->utility->verifyPaymentSignature([
        'razorpay_order_id' => $order_id,
        'razorpay_payment_id' => $payment_id,
        'razorpay_signature' => $signature
    ]);
} catch(Exception $e){
    die("Payment Failed: " . $e->getMessage());
}

/* =======================
   FETCH DATA FROM DB (JOIN)
======================= */
$q = mysqli_query($conn, "
SELECT 
    c.*,
    p.name AS product_name,
    p.description,
    p.image
FROM checkout c
LEFT JOIN products p ON c.p_id = p.p_id
WHERE c.razorpay_order_id = '$order_id'
");

$data = mysqli_fetch_assoc($q);

if(!$data){
    die("Order Not Found");
}

/* =======================
   UPDATE PAYMENT STATUS
======================= */
mysqli_query($conn, "
UPDATE checkout 
SET 
    razorpay_payment_id='$payment_id',
    razorpay_signature='$signature',
    status='paid'
WHERE razorpay_order_id='$order_id'
");

/* =======================
   QR CODE GENERATE
======================= */
if(!is_dir(__DIR__."/qr")){
    mkdir(__DIR__."/qr", 0777, true);
}

$qr_file = __DIR__."/qr/order_$order_id.png";

QRcode::png(
"STAR SHOPPING RECEIPT
Order ID: $order_id
Customer: {$data['name']}
Product: {$data['product_name']}
Amount: {$data['amount']}
Payment ID: $payment_id
Status: PAID",
$qr_file,
QR_ECLEVEL_L,
5
);

/* =======================
   PDF GENERATE
======================= */
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(0,102,204);
$pdf->Cell(190,10,"STAR SHOPPING RECEIPT",0,1,"C");

$pdf->Ln(5);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',12);

/* CUSTOMER DETAILS */
$pdf->Cell(60,10,"Customer Name:",0,0);
$pdf->Cell(100,10,$data['name'],0,1);

$pdf->Cell(60,10,"Contact:",0,0);
$pdf->Cell(100,10,$data['contact'],0,1);

$pdf->Cell(60,10,"Address:",0,0);
$pdf->Cell(100,10,$data['address'],0,1);

$pdf->Ln(5);

/* PRODUCT DETAILS */
$pdf->Cell(60,10,"Product:",0,0);
$pdf->Cell(100,10,$data['product_name'],0,1);

$pdf->Cell(60,10,"Amount:",0,0);
$pdf->Cell(100,10,"Rs. ".$data['amount'],0,1);

$pdf->Cell(60,10,"Status:",0,0);
$pdf->Cell(100,10,$data['status'],0,1);

$pdf->Cell(60,10,"Payment ID:",0,0);
$pdf->Cell(100,10,$payment_id,0,1);

$pdf->Cell(60,10,"Order ID:",0,0);
$pdf->Cell(100,10,$order_id,0,1);

$pdf->Ln(10);

/* QR CODE */
$pdf->Cell(190,10,"Scan QR Code:",0,1,"C");
$pdf->Image($qr_file,80,120,40,40);

/* FOOTER */
$pdf->Ln(60);
$pdf->Cell(190,10,"Thank You For Shopping ❤️",0,1,"C");

$pdf->Output("I","receipt.pdf");
exit;
?>