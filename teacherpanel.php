

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
    <script src="js/teacherpanelscript.js"></script>
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
            <span class="nav-link" style="color: white; border-right: 1px solid #fff; padding-left: 17px;">Teacher Dashboard</span>
            </li>

            <!-- Displaying the logged-in user's name -->
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
    <a class="nav-link btn btn-danger btn-sm" href="teacherlogout.php" style="color: white;">Logout</a>
</li>
</ul>
</nav>


<?php
    require("teacherloginprocess.php");

    if (!isset($_SESSION['loggedin'])) {
        header('Location: teacherlogin.php');
        exit();
    }

    $user_email = $_SESSION['email'];
    $query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $user_fname = $row['user_fname'];
    } else {
        $user_fname = '';
    }

    include('connection.php');

    $sql = "SELECT user_id, user_fname, student_name, alert, date FROM teachernotifications";
    $whereClause = "";

    if (!empty($user_fname)) {
        $whereClause = " WHERE (user_fname = '$user_fname' OR user_fname IS NULL OR user_fname = '') OR user_fname = 'admin'";
    } else {
        $whereClause = " WHERE user_fname = 'admin'";
    }

    $sql .= $whereClause;
    $result = $conn->query($sql);
    $numNotifications = $result->num_rows;
    $modalContentHeight = max(300, $numNotifications * 50);

    
    if (isset($_POST['clearNotifications'])) {
        $notificationIds = array();
        
        while ($row = $result->fetch_assoc()) {
            // Check if the user_fname is 'admin'; if so, skip it
            if ($row['user_fname'] !== 'admin') {
                $notificationIds[] = $row['user_id'];
            }
        }
    
        // Performing the deletion query based on the user_id
        if (!empty($notificationIds)) {
            $notificationIdsString = implode(',', $notificationIds);
            $deleteQuery = "DELETE FROM teachernotifications WHERE user_id IN ($notificationIdsString)";
            $deleteResult = $conn->query($deleteQuery);
    
            // Checking if the deletion was successful
            if ($deleteResult) {
                echo '<script>window.location.href = "teacherpanel.php";</script>';
                exit();
            } else {
                die('Error: Unable to clear notifications.');
            }
        }
    }
    
?>






<div id="notificationModal" class="modal">
        <div class="modal-content" style="width: 600px; height: 500px; overflow-y: auto;">
            <center>
                <h2>Notifications</h2>
            </center>
            <hr>
            <button id="clearNotifications" class="btn btn-sm btn-primary" style="margin-bottom: 10px;" data-action="clearNotifications">Clear Notifications</button>

<form id="clearNotificationsForm" method="post" style="display: none;">
    <input type="hidden" name="clearNotifications" value="1">
</form>
            <span class="close">&times;</span>
            <?php
            if ($numNotifications > 0) {
                echo '<ul>';
                while ($row = $result->fetch_assoc()) {
                    echo '<li style="margin-bottom: 20px;">';
                    echo '<strong>Notification ID:</strong> ' . $row['user_id'] . '<br>';
                    echo '<strong>User Name:</strong> ' . $row['user_fname'] . '<br>';
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

        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    
    $(document).ready(function () {
    $("#notificationIcon").click(function () {
        $("#notificationModal").fadeIn();
    });

    $(".close").click(function () {
        $("#notificationModal").fadeOut();
    });

    $("#clearNotifications").click(function () {
        // Submiting the form for deletion
        $("#clearNotificationsForm").submit();
    });

    // Initial update of the notification count
    updateNotificationCount(<?php echo $numNotifications; ?>);
});

    function updateNotificationCount(count) {
        
        var badge = $("#notificationCount");
        badge.text(count);
        count > 0 ? badge.show() : badge.hide();
    }
</script>



<style>

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(169, 169, 169, 0.5); 
}


.modal-content {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    width: 80px; 
    max-width: calc(100% - 40px); 
    height: 400px; 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}





.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

</style>















<div id="sidebar">
    <h2>EduTrack</h2>
    <ul class="nav flex-column">
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('teacherdashboard')">Dashboard</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('teacherenrollstudent')">Enroll Students</button>
        </li>

        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('markattendance')">Mark Attendance</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('viewcourse')">View Courses</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('teacherviewclass')">View Classes</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('generateattendancereport')">Generate Attendance Report</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('viewabsentapplications')">View Absent Application</button>
        </li> 
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('sendalert')">Send Alerts To Students</button>
        </li> 
        <li class="nav-item">
            <button class="btn btn-dark" onclick="loadContent('viewgraph')">View Class Analytics</button>
        </li> 
     
    </ul>
</div>

<div id="content"></div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        loadContent('teacherdashboard');
    });

    document.addEventListener('DOMContentLoaded', function () {
        loadContent('teacherdashboard');

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
