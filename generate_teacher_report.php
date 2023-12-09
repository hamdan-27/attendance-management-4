<?php
session_start();

include_once("connection.php");
include_once("fpdf184/fpdf.php");

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: teacherloginprocess.php');
    exit();
}

$server = 'localhost';
$username = 'root';
$password = '';
$db = 'edutrack';

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// i am fetching class_tutor_name based on user's email
$user_email = $_SESSION['email'];
$user_query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
$user_result = mysqli_query($conn, $user_query);

if ($user_result && $user_row = mysqli_fetch_assoc($user_result)) {
    $user_fname = $user_row['user_fname'];

    // i am feetching reports data based on class_tutor_name
    $report_query = "SELECT * FROM reports WHERE class_tutor_name = '$user_fname'";
    $report_result = mysqli_query($conn, $report_query);

    if ($report_result && mysqli_num_rows($report_result) > 0) {
        generatePDF($report_result);
    } else {
        die("No report data found for the teacher: $user_fname");
    }
} else {
    die("Error fetching user data");
}

function generatePDF($result)
{
    class PDF extends FPDF {
        // Header
        function Header()
        {
            $this->Image('imgs/edutracklogo.png', 12, 2, 26);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(60);
            $this->Cell(80, 10, 'Report', 1, 0, 'C');
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }

        // Seting the page width
        function SetWidth($width)
        {
            $this->W = $width;
        }
    }

    $pdf = new PDF();
    $pdf->SetAutoPageBreak(true, 15); 
    $pdf->SetMargins(10, 10, 10);

    $pdf->AddPage();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial', 'B', 7);

    $pdf->SetY(30);

    $maxWidths = [];
    $padding = -6;

    // Specifyin the column names that should be displayed in PDF file after opening in new tabs
    $columnsToInclude = [
        'attendance_id',
        'report_date',
        'report_status',
        'attendance_student',
        'attendance_class',
        'class_tutor_name'
    ];

// Header
$initialX = $pdf->GetX() + 24; // Add an offset to move the header to the right
$initialY = $pdf->GetY(); // Save the initial Y position

foreach ($columnsToInclude as $columnName) {
    $pdf->SetXY($initialX, $initialY); // Set X and Y position
    $pdf->Cell(30 + $padding, 12, ucwords(str_replace('_', ' ', $columnName)), 1, 0, '', 0);
    $initialX += 30 + $padding; // Update initialX for the next cell
}

  

 // Data
while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Ln();
    
    
    for ($i = 0; $i < 1; $i++) {
        $pdf->Cell(30 + $padding, 12, '', 0);
    }

    // Output the actual data
    foreach ($columnsToInclude as $columnName) {
        $pdf->Cell(30 + $padding, 12, $row[$columnName], 1, 0, 'C');
    }
}
    // Outputing PDF as our result when runned the file
    $pdf->Output();
}

mysqli_close($conn);
?>
