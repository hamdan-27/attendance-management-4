<?php
require("teacherloginprocess.php");

if (!isset($_SESSION['loggedin'])){ 
    header('Location: teacherlogin.php');
    exit();
} 

require('connection.php');

$user_email = $_SESSION['email'];
$query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetch the data
    $row = mysqli_fetch_assoc($result);
    $user_fname = $row['user_fname'];

    // Fetch data from the reports table
    $queryReports = "SELECT report_date, report_status FROM reports WHERE class_tutor_name = '$user_fname'";
    $resultReports = mysqli_query($conn, $queryReports);

    if ($resultReports) {
        $reportData = array();
        while ($rowReports = mysqli_fetch_assoc($resultReports)) {
            $date = $rowReports['report_date'];
            $status = $rowReports['report_status'];

            // Counting occurrences of "Present" and "Absent" for each date
            if (!isset($reportData[$date])) {
                $reportData[$date] = array('Present' => 0, 'Absent' => 0);
            }

            $reportData[$date][$status]++;
        }

        mysqli_free_result($resultReports);
    } else {
        echo "Error fetching reports: " . mysqli_error($conn);
    }

    mysqli_free_result($result);
} else {
    echo "Error fetching user details: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph Page</title>
    
    <!-- Including Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #chart-container {
            width: 100%;
            max-width: 1300px;
            margin: auto;
        }
    </style>
</head>
<body>

<!-- Chart container -->
<div id="chart-container">
    <canvas id="myChart" width="800" height="400"></canvas>
</div>

<script>
    // Your JavaScript code remains unchanged
    var chartData = <?php echo json_encode($reportData); ?>;
    var dates = Object.keys(chartData);
    var presentData = dates.map(date => chartData[date]['Present']);
    var absentData = dates.map(date => chartData[date]['Absent']);

    // Creating line chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Present',
                data: presentData,
                borderColor: 'green',
                borderWidth: 2,
                fill: false,
            }, {
                label: 'Absent',
                data: absentData,
                borderColor: 'red',
                borderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    type: 'category',
                    title: {
                        display: true,
                        text: 'Attendance Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Student Count'
                    }
                }
            }
        }
    });
</script>

</body>
</html>
