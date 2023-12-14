<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student's page</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
  <script src="js/studentpanelscript.js"></script>
  <script src="https://kit.fontawesome.com/2ba669933d.js" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/stylestudentpanel.css">
  <style>
        #sidebar {
            position: fixed;
            height: 100%;
            width: 250px;
            z-index: 1;
            top: 60px; 
            left: 0;
            background-color: #2B5BA4;
            padding-top: 20px;
            transition: left 0.3s;
        }

        #content {
            margin-left: 250px;
            padding: 16px;
            margin-top: 60px;
        }

        .navbar {
            background-color: #2B5BA4;
        }
    

        .navbar-brand {
            font-size: 26px;
            color: white;
        }

        .navbar-toggler-icon {
            color: white;
        }
        .navbar-nav .nav-link {
            display: inline-block;
            padding: 8px 10px; 
        }
        #sidebar h2 {
            background-color: #2B5BA4;
            color: white;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        #sidebar .btn-dark {
            background-color: white;
            color: #111;
            width: 100%;
            margin-bottom: 10px;
            margin-left: 5px;
            border-radius: 7px;
        }

        #sidebar .btn-dark.active {
            background-color: grey;
        }

        #sidebar .btn-dark:hover {
            background-color: grey;
        }

        @media screen and (max-width: 768px) {
            #sidebar {
                left: -250px; 
            }

            #content {
                margin-left: 0;
                padding-top: 16px;
            }

            #sidebar h2 {
                padding: 10px;
            }
        }
    </style>
</head>
<body>





<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="#" style="color: white;">
        EduTrack
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
    <div class="mx-auto d-flex justify-content-center">
    <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <span class="nav-link" style="color: white; border-right: 1px solid #fff; padding-left: 17px;">Student Dashboard</span>
            </li>

            <!-- Displaying the logged-in user's name -->
            <?php
            require("studentloginprocess.php");
            if (!isset($_SESSION['loggedin'])){ 
                header('Location: studentlogin.php');
                exit();
            } 

            require('connection.php');

            $user_email = $_SESSION['email'];
            $query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                // Fetching the data
                $row = mysqli_fetch_assoc($result);
                $user_fname = $row['user_fname'];

                echo '<li class="nav-item"> <!-- Remove text-center class -->
                        <span class="nav-link" style="color: white; border-right: 1px solid #fff; padding-right: 10px; padding-top: 8px;">
                            <i class="fas fa-user"></i> ' . $user_fname . '
                        </span>
                      </li>';
            }
            ?>
      
          </ul>
        </div>
    </div>
   
    <ul class="navbar-nav ml-auto">
   <!-- Notification Bell Icon -->
<li class="nav-item">
    <a class="nav-link" href="#" id="notificationIcon" style="color: white; position: relative;">
        <i class="fas fa-bell"></i>
        <span id="notificationCount" class="badge badge-danger" style="position: absolute; top: 0; right: 0; display: none;"></span>
    </a>
</li>

<li class="nav-item" style="margin-left: 10px;">
    <a class="nav-link btn btn-danger btn-sm" href="studentlogout.php" style="color: white;">Logout</a>
</li>
</ul>
</nav>


<?php
// Check if the user is logged in
require("studentloginprocess.php");

if (!isset($_SESSION['loggedin'])) {
    header('Location: studentlogin.php');
    exit();
}

// Get the student name from the session
$user_email = $_SESSION['email'];
$query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Fetch the data
    $row = mysqli_fetch_assoc($result);
    $student_name = $row['user_fname'];
} else {
    // Set a default value or handle the case when the query fails
    $student_name = ''; // Change this to a default value or handle accordingly
}

// Include your database connection
include('connection.php');

// Build the SQL query
$sql = "SELECT user_id, user_fname, student_name, alert, date FROM notifications";
$whereClause = "";

// Add a condition to fetch data for the specific student if the name is available
if (!empty($student_name)) {
    $whereClause = " WHERE student_name = '$student_name' OR student_name IS NULL OR student_name = ''";
}

// Append the condition to the query
$sql .= $whereClause;

// Fetch data from the notifications table
$result = $conn->query($sql);

// Calculate the number of notifications
$numNotifications = $result->num_rows;

// Calculate the height of the modal content based on the number of notifications
$modalContentHeight = max(300, $numNotifications * 50); // Minimum height is 200px, and each notification takes 40px

// Close the database connection
$conn->close();
?>






<div id="notificationModal" class="modal">
<div class="modal-content" style="width: 600px; height: 500px; overflow-y: auto;">

        <center><h2>Notifications</h2></center>
        <hr>
        <button id="clearNotifications" class="btn btn-sm btn-primary" style="margin-bottom: 10px;">Clear Notifications</button>
        <span class="close">&times;</span>
        <?php
        // Check if there are any rows in the result
        if ($numNotifications > 0) {
            // Output data as a list
            echo '<ul>';
            while ($row = $result->fetch_assoc()) {
                echo '<li style="margin-bottom: 20px;">'; // Adjust the margin-bottom as needed
                echo '<strong>Notification ID:</strong> ' . $row['user_id'] . '<br>';
                echo '<strong>Teacher Name:</strong> ' . $row['user_fname'] . '<br>';
                echo '<strong>Student Name:</strong> ' . $row['student_name'] . '<br>';
                echo '<strong>Alert Message:</strong> ' . $row['alert'] . '<br>';
                echo '<strong>Date:</strong> ' . $row['date'] . '<br>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No notifications found.';
        }
        ?>

        <!-- Add your notification content here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Show the modal when the notification icon is clicked
        $("#notificationIcon").click(function () {
            $("#notificationModal").fadeIn();
        });

        // Hide the modal when the close button is clicked
        $(".close").click(function () {
            $("#notificationModal").fadeOut();
        });

        // Clear notifications when the "Clear Notifications" button is clicked
        $("#clearNotifications").click(function () {
            // Here, you can use AJAX to send a request to the server to clear the notifications for that user
            // For simplicity, I'm just hiding the notifications in this example
            $("#notificationModal ul").empty(); // Remove all items from the list
            $("#notificationModal").fadeOut(); // Hide the modal
            updateNotificationCount(0); // Reset the notification count
        });

        // Initial update of the notification count
        updateNotificationCount(<?php echo $numNotifications; ?>);
    });

    function updateNotificationCount(count) {
        // Update the notification count and show/hide badge based on the count
        var badge = $("#notificationCount");
        badge.text(count);
        count > 0 ? badge.show() : badge.hide();
    }
</script>



<style>
  /* Style for the modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(169, 169, 169, 0.5); /* Light grey color with alpha (transparency) */
}

/* Style for the modal content */
.modal-content {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    width: 80px; /* Adjust the width to your preference */
    max-width: calc(100% - 40px); /* Set the max-width to ensure it doesn't touch the edges */
    height: 400px; /* Set the height to the same value as the width */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}




/* Style for the close button */
.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

</style>







<div id="sidebar">
  <h2>&nbsp; EduTrack</h2> <br>
  <ul class="nav flex-column">
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('studentdashboard')">Dashboard</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('studentviewattendance')">View My Attendance</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('studentmanageclass')">View My Class</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('studentabsentapplication')">Absente Application</button>
    </li>
    <li class="nav-item">
      <button class="btn btn-dark" onclick="loadContent('studenteditprofile')">Edit My Profile</button>
    </li> <br><br><br>
  </ul>
</div>

<div id="content"></div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<script>
  document.addEventListener('DOMContentLoaded', function () {

    loadContent('studentdashboard');
  });
</script>



<script>
  document.addEventListener('DOMContentLoaded', function () {

    loadContent('studentdashboard');


    var buttons = document.querySelectorAll('.btn-dark');
    buttons.forEach(function(button) {
      button.addEventListener('click', function() {
      
        buttons.forEach(function(btn) {
          btn.classList.remove('active');
        });
      
        button.classList.add('active');
      });
    });
  });
</script>

</body>
</html>
