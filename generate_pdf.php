<?php

include_once("connection.php");
include_once("fpdf184/fpdf.php");


$server = 'localhost';
$username = 'root';
$password = '';
$db = 'edutrack';

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

class PDF extends FPDF {
    // Header
    function Header()
    {
        $this->Image('imgs/edutrack2.jpg', 10, -1, 20);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(80);
        $this->Cell(80, 10, 'Attendance Report', 1, 0, 'C');
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
$pdf = new PDF();
$pdf->SetAutoPageBreak(true, 15); // Allowing for auto page break with a margin of 15 units
$pdf->SetMargins(10, 10, 10);


$result = mysqli_query($conn, "SELECT attendance_id, attendance_student, attendance_class, attendance_status, present_percentage, absent_percentage, date, class_tutor_name FROM attendance") or die("database error:" . mysqli_error($conn));

$header = mysqli_query($conn, "SHOW columns FROM attendance");

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 8);

// Find maximum content width for each column
$maxWidths = [];
$padding = 1; 

foreach ($header as $heading) {
    $fieldName = $heading['Field'];
    $maxWidth = $pdf->GetStringWidth(ucwords(str_replace('_', ' ', $fieldName))) + $padding;
    mysqli_data_seek($result, 0);
    while ($row = mysqli_fetch_assoc($result)) {
        $contentWidth = $pdf->GetStringWidth($row[$fieldName]) + $padding;
        if ($contentWidth > $maxWidth) {
            $maxWidth = $contentWidth;
        }
    }
    $maxWidths[$fieldName] = $maxWidth;
}




// Header
foreach ($header as $heading) {
    $fieldName = $heading['Field'];
    $pdf->Cell($maxWidths[$fieldName], 12, ucwords(str_replace('_', ' ', $fieldName)), 1);
}

// Data
mysqli_data_seek($result, 0);
foreach ($result as $row) {
    $pdf->Ln();
    foreach ($row as $fieldName => $column) {
        $pdf->Cell($maxWidths[$fieldName], 12, $column, 1);
    }
}

$pdf->Output();
?>
