<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('fpdf19 (1)/fpdf.php');
include('conn.php');

// Create PDF
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// Title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Receipt Report (Amount Wise Descending)', 0, 1, 'C');
$pdf->Ln(5);

// Table Header
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(25, 10, 'RNO', 1);
$pdf->Cell(25, 10, 'DATE', 1);
$pdf->Cell(35, 10, 'STUD ID', 1);
$pdf->Cell(55, 10, 'STUDENT NAME', 1);
$pdf->Cell(20, 10, 'CODE', 1);
$pdf->Cell(70, 10, 'COURSE', 1);
$pdf->Cell(20, 10, 'AMOUNT', 1);
$pdf->Cell(35, 10, 'PAYMENT', 1);

$pdf->Ln();

// Fetch Data (Highest Amount First)
$sql = "SELECT * FROM receipt ORDER BY CAST(amt AS UNSIGNED) DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query Failed : " . mysqli_error($conn));
}

// Table Data
$pdf->SetFont('Arial', '', 9);

while ($row = mysqli_fetch_assoc($result))
{
    $pdf->Cell(25, 10, $row['rno'], 1);
    $pdf->Cell(25, 10, $row['rdate'], 1);
    $pdf->Cell(35, 10, $row['stud_id'], 1);
    $pdf->Cell(55, 10, $row['stud_nm'], 1);
    $pdf->Cell(20, 10, $row['ccode'], 1);
    $pdf->Cell(70, 10, $row['cname'], 1);
    $pdf->Cell(20, 10, $row['amt'], 1);
    $pdf->Cell(35, 10, $row['pay_method'], 1);

    $pdf->Ln();
}

// Output PDF
$pdf->Output();

?>
