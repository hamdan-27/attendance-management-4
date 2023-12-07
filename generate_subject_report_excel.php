<?php

include_once("connection.php");

$output = "";

if (isset($_POST['generate_subject_excel'])) {
    $selected_class = $_POST['selected_class'];

    $sql = "SELECT * FROM reports WHERE attendance_class = '$selected_class'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $output .= "report_id\tattendance_id\treport_date\treport_status\tattendance_student\tattendance_class\tclass_tutor_name\n";

        while ($row = mysqli_fetch_assoc($res)) {
            $output .= implode("\t", $row) . "\n";
        }

        // Headers
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=subject_report.xls');


        echo $output;
        exit(); 
    } else {
        echo 'Query failed: ' . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
