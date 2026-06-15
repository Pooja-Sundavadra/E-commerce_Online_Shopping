<?php
require('fpdf.php');
include("config.php");
require(__DIR__ . "/../phpqrcode/qrlib.php");

$order_id = $_GET['order_id'] ?? 0;

/* =========================
   GET ORDER DETAILS
========================= */

$q = mysqli_query($conn, "
SELECT o.*, p.name AS product_name, p.image
FROM orders o
JOIN products p ON o.p_id = p.p_id
WHERE o.order_id = '$order_id'
");

$order = mysqli_fetch_assoc($q);

if(!$order){
    die("Invalid Order");
}

/* =========================
   CREATE QR CODE
========================= */

$qrText = "Order ID: ".$order['order_id'].
          "\nName: ".$order['name'].
          "\nProduct: ".$order['product_name'].
          
          "\nStatus: ".$order['status'];

$qrFile = "qr_".$order_id.".png";

// generate QR image
QRcode::png($qrText, $qrFile, QR_ECLEVEL_L, 4);


/* =========================
   CREATE PDF
========================= */

$pdf = new FPDF();
$pdf->AddPage();

/* HEADER */
$pdf->SetFont('Arial','B',18);
$pdf->Cell(190,10,'STAR SHOPPING ',0,1,'C');

$pdf->SetFont('Arial','',12);
$pdf->Cell(190,10,'PAST ORDER INVOICE',0,1,'C');
$pdf->Ln(5);

/* LINE */
$pdf->Cell(190,0,'',1,1);
$pdf->Ln(5);

/* ORDER INFO */
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Order ID:',0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(140,10,$order['order_id'],0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Customer Name:',0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(140,10,$order['name'],0,1);




$pdf->Ln(5);

/* PRODUCT INFO */
$pdf->Cell(190,0,'',1,1);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Product:',0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(140,10,$order['product_name'],0,1);

$pdf->Ln(5);

$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'QR Code:',0,1);

$pdf->Image($qrFile, 10, $pdf->GetY(), 40, 40);

/* FOOTER */
$pdf->SetFont('Arial','I',10);
$pdf->Cell(190,10,'This is a past order invoice only.',0,1,'C');

$pdf->Cell(190,10,'Thank you for shopping with STAR SHOPPING 🛍️',0,1,'C');

$pdf->Output();
?>