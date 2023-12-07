<?php

include_once("connection.php");

$output = "";

if (isset($_POST['generate_excel'])) {
    $sql = "SELECT * FROM reports";
    $res = mysqli_query($conn, $sql);  

    if ($res) {
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

        while ($row = mysqli_fetch_assoc($res)) {
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

        // Set headers for downloaded excel
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=reports.xls');

        // Output data
        echo $output;
        exit(); // Stop further execution of excel
    } else {
        echo 'Query failed: ' . mysqli_error($conn);
    }
}

?>
