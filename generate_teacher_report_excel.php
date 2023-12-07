<?php
session_start();

include_once("connection.php");

// lets check if the user is logged in
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

// we will fetchs class_tutor_name based on user's email
$user_email = $_SESSION['email'];
$user_query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
$user_result = mysqli_query($conn, $user_query);

if ($user_result && $user_row = mysqli_fetch_assoc($user_result)) {
    $user_fname = $user_row['user_fname'];

    // Fetching reports data based on class_tutor_name
    $report_query = "SELECT * FROM reports WHERE class_tutor_name = '$user_fname'";
    $report_result = mysqli_query($conn, $report_query);

    if ($report_result && mysqli_num_rows($report_result) > 0) {
        generateExcel($report_result);
    } else {
        die("No report data found for the teacher: $user_fname");
    }
} else {
    die("Error fetching user data");
}

function generateExcel($result)
{
    // Set headers for download excel file
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=reports.xls');

    // Output headers
    echo "report_id\tattendance_id\treport_date\treport_status\tattendance_student\tattendance_class\tclass_tutor_name\n";

    while ($row = mysqli_fetch_assoc($result)) {
        // Output data
        echo $row["report_id"] . "\t" .
             $row["attendance_id"] . "\t" .
             $row["report_date"] . "\t" .
             $row["report_status"] . "\t" .
             $row["attendance_student"] . "\t" .
             $row["attendance_class"] . "\t" .
             $row["class_tutor_name"] . "\n";
    }

    exit(); 
}

mysqli_close($conn);
?>
