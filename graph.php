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
        // Process the data for the graph
        $reportData = array();

        while ($rowReports = mysqli_fetch_assoc($resultReports)) {
            $date = $rowReports['report_date'];
            $status = $rowReports['report_status'];

            // Count occurrences of "Present" and "Absent" for each date
            if (!isset($reportData[$date])) {
                $reportData[$date] = array('Present' => 0, 'Absent' => 0);
            }

            $reportData[$date][$status]++;
        }

        // Close the reports result set
        mysqli_free_result($resultReports);
    } else {
        echo "Error fetching reports: " . mysqli_error($conn);
    }

    // Close the user details result set
    mysqli_free_result($result);
} else {
    echo "Error fetching user details: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph Page</title>
    
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<!-- Chart container -->
<div style="width: 80%; margin: auto;">
    <canvas id="myChart"></canvas>
</div>

<script>
// Create an array of dates and counts for "Present" and "Absent"
var chartData = <?php echo json_encode($reportData); ?>;

// Extract labels (dates) and data for each status
var dates = Object.keys(chartData);
var presentData = dates.map(date => chartData[date]['Present']);
var absentData = dates.map(date => chartData[date]['Absent']);

// Create a line chart
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
            fill: false
        }, {
            label: 'Absent',
            data: absentData,
            borderColor: 'red',
            borderWidth: 2,
            fill: false
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
                    text: 'Report Date'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Count'
                }
            }
        }
    }
});
</script>

</body>
</html>
