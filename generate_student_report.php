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
        $this->Image('imgs/edutracklogo.png', 12, 2, 26);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(60);
        $this->Cell(80, 10, 'Student Report', 1, 0, 'C');
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
$pdf->SetAutoPageBreak(true, 15);
$pdf->SetMargins(10, 10, 10);

$selected_student = $_POST['selected_student'] ?? "";

$result = mysqli_query($conn, "SELECT report_id, attendance_id, report_date, report_status, attendance_student, attendance_class, class_tutor_name FROM reports WHERE attendance_student = '$selected_student'") or die("database error:" . mysqli_error($conn));

$header = mysqli_query($conn, "SHOW columns FROM reports");

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 8);

$maxWidths = [];
$padding = 6;

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
