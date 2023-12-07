<?php
include_once("connection.php");

$output = "";

$selected_student = $_POST['selected_student'] ?? "";

if (isset($_POST['generate_student_excel'])) {
    $result = mysqli_query($conn, "SELECT report_id, attendance_id, report_date, report_status, attendance_student, attendance_class, class_tutor_name FROM reports WHERE attendance_student = '$selected_student'") or die("database error:" . mysqli_error($conn));

    $output .= '
    <table class="table" bordered="1">
        <tr>
            <th>report_id</th>
            <th>attendance_id</th>
            <th>report_date</th>
            <th>report_status</th>
            <th>attendance_student</th>
            <th>attendance_class</th>
            <th>class_tutor_name</th>
        </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '
        <tr>
            <td>' . $row["report_id"] . '</td> 
            <td>' . $row["attendance_id"] . '</td> 
            <td>' . $row["report_date"] . '</td> 
            <td>' . $row["report_status"] . '</td> 
            <td>' . $row["attendance_student"] . '</td> 
            <td>' . $row["attendance_class"] . '</td> 
            <td>' . $row["class_tutor_name"] . '</td>
        </tr>';
    }

    $output .= '</table>';

    //Jeaders
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=student_reports.xls');

    // Output data
    echo $output;
    exit(); // Stop further execution of excel
}
?>
