<?php
require('fpdf.php');

// Retrieve the user's selection from the statistics.php file
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Connect to the database
include '../includes/connection.php';

// Check if the user's selection for the start and end dates are valid
if ($start_date && $end_date) {
  // Retrieve the data from the database based on the user's selection
  $sql = "SELECT b.NAME, SUM(a.QTY*a.PRICE) as TOTAL_SALES, SUM(a.QTY) as TOTAL_QTY
          FROM transaction_details as a
          LEFT JOIN product as b
          ON a.PRODUCTS= b.NAME
          WHERE DATE >= '$start_date' AND DATE <= '$end_date'
          GROUP BY a.PRODUCTS";

  $result = mysqli_query($db, $sql) or die (mysqli_error($db));

  // Create a new PDF document
  $pdf = new FPDF();
  $pdf->AddPage();

  // Set the font and font size
  $pdf->SetFont('Arial','B',16);

  // Add a title to the report
  $pdf->Cell(0,10,'Total Sales Report Per Product',1,1,'C');
  $pdf->Cell(0,10,'',0,1);

  // Set the font and font size for the data
  $pdf->SetFont('Arial','',12);

  // Add the data to the report
$pdf->Cell(35,10,'Start Date',1,0,'C');
$pdf->Cell(35,10,$start_date,1,1,'C');
$pdf->Cell(35,10,'End Date',1,0,'C');
$pdf->Cell(35,10,$end_date,1,1,'C');
$pdf->Cell(70,10,'Product',1,0,'C');
$pdf->Cell(40,10,'Total Sales',1,0,'C');
$pdf->Cell(40,10,'Total Quantity',1,1,'C'); // Add this line for the column header

// Loop through the result set and add the data to the PDF report
while ($row = mysqli_fetch_assoc($result)) {
  $pdf->Cell(70,10,$row['NAME'],1,0);
  $pdf->Cell(40,10,$row['TOTAL_SALES'],1,0,'C');
  $pdf->Cell(40,10,$row['TOTAL_QTY'],1,1,'C'); // Add this line for the total quantity data
}

  // Set the headers for the download
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="report.pdf"');

  // Output the PDF report
  $pdf->Output();
} else {
  echo "Invalid start or end date.";
}