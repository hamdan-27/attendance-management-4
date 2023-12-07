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

    // footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['generate_date_pdf'])) {
        if (isset($_POST['attendance_date'])) {
            $selectedDate = $_POST['attendance_date'];

            // Fetching class_tutor_name based on user's email so only those reports can be shown which teacher is logged in
            session_start();
            $user_email = $_SESSION['email'];
            $user_query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
            $user_result = mysqli_query($conn, $user_query);

            if ($user_result && $user_row = mysqli_fetch_assoc($user_result)) {
                $user_fname = $user_row['user_fname'];

                // Fetching reports data based on class_tutor_name and selected date so that teachers can view the report based on their subject and date
                $result = mysqli_query($conn, "SELECT report_id, attendance_id, report_date, report_status, attendance_student, attendance_class, class_tutor_name 
                                                FROM reports 
                                                WHERE class_tutor_name = '$user_fname' AND report_date = '$selectedDate'") or die("database error:" . mysqli_error($conn));

                // Generating PDF with filtered data out of all the reports
                generatePDF($result);
            } else {
                die("Error fetching user data");
            }
        } else {
            echo "Please select a date.";
        }
    }
}

function generatePDF($data)
{
    $pdf = new PDF();
    $pdf->SetAutoPageBreak(true, 15);
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial', 'B', 7);

    // Header
    $header = mysqli_query($GLOBALS['conn'], "SHOW columns FROM reports");
    $maxWidths = [];
    $padding = 3;

    foreach ($header as $heading) {
        $fieldName = $heading['Field'];
        $maxWidth = $pdf->GetStringWidth(ucwords(str_replace('_', ' ', $fieldName))) + $padding;
        mysqli_data_seek($data, 0);
        while ($row = mysqli_fetch_assoc($data)) {
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
    mysqli_data_seek($data, 0);
    foreach ($data as $row) {
        $pdf->Ln();
        foreach ($row as $fieldName => $column) {
            $pdf->Cell($maxWidths[$fieldName], 12, $column, 1);
        }
    }

    $pdf->Output();
}
?>
