<?php

include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['generate_date_excel'])) {
        if (isset($_POST['attendance_date_excel'])) {
            $selectedDate = $_POST['attendance_date_excel'];

            //Here we wil be  fetching class_tutor_name based on user's email so only those reports can be shown which teacher is logged in
            session_start();
            $user_email = $_SESSION['email'];
            $user_query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
            $user_result = mysqli_query($conn, $user_query);

            if ($user_result && $user_row = mysqli_fetch_assoc($user_result)) {
                $user_fname = $user_row['user_fname'];

                //here it is done like fetching reports data based on class_tutor_name and selected date so that teachers can view the report based on their subject and date
                $result = mysqli_query($conn, "SELECT report_id, attendance_id, report_date, report_status, attendance_student, attendance_class, class_tutor_name 
                                                FROM reports 
                                                WHERE class_tutor_name = '$user_fname' AND report_date = '$selectedDate'") or die("database error:" . mysqli_error($conn));

                // Generating Excel with filtered data out of all the reports so user cann download it.
                generateExcel($result);
            } else {
                die("Error fetching user data");
            }
        } else {
            echo "Please select a date.";
        }
    }
}

function generateExcel($data)
{
    // Set headers for downloaded excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=reports.xls');

    // Headers
    echo "report_id\tattendance_id\treport_date\treport_status\tattendance_student\tattendance_class\tclass_tutor_name\n";

    while ($row = mysqli_fetch_assoc($data)) {
        // Output data
        echo $row["report_id"] . "\t" .
             $row["attendance_id"] . "\t" .
             $row["report_date"] . "\t" .
             $row["report_status"] . "\t" .
             $row["attendance_student"] . "\t" .
             $row["attendance_class"] . "\t" .
             $row["class_tutor_name"] . "\n";
    }

    exit(); // Stop further execution of excel
}

?>
