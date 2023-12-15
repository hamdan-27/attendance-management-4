<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
    <script src="js/adminpanelscript.js"></script>
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
                        <span class="nav-link" style="color: white; border-right: 1px solid #fff; padding-left: 17px;">Admin Dashboard</span>
                    </li>

                    <!-- Displaying the logged-in user's name -->
                    <?php
                    require("adminloginprocess.php");
                    if (!isset($_SESSION['loggedin'])) {
                        header('Location: adminlogin.php');
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
            <li class="nav-item">
                <a class="nav-link btn btn-danger btn-sm" href="adminlogout.php" style="color: white;">Logout</a>
            </li>

    </nav>

    <div id="sidebar">
        <h2>EduTrack</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <!-- <button onclick="loadContent('admindashboard')">Dashboard</button> -->
                <a class="btn btn-dark" href="admindashboard.html">Dashboard</a>
            </li>
            <li class="nav-item">
                <!-- <button onclick="loadContent('adminadduser')">Add New Users</button> -->
                <a class="btn btn-dark" href="adminadduser.html">Add New User</a>
            </li>
            <li class="nav-item">
                <!-- <button onclick="loadContent('manageusers')">Manage Users</button> -->
                <a class="btn btn-dark" href="manageusers.html">Manage Users</a>
            </li>
            <li class="nav-item">
                <!-- <button onclick="loadContent('adminaddcourses')">Add New Courses</button> -->
                <a class="btn btn-dark" href="adminaddcourses.html">Add New Courses</a>
            </li>
            <li class="nav-item">
                <!-- <button onclick="loadContent('adminmanagecourses')">Manage Courses</button> -->
                <a class="btn btn-dark" href="adminmanagecourses.html">Manage Courses</a>
            </li>
            <li class="nav-item">
                <button class="btn btn-dark" onclick="loadContent('admingeneratereport')">Generate Attendance Report</button>
                <!-- <a class="btn btn-dark" href="admingeneratereport.html">Generate Attendance Report</a> -->
            </li> 
            <li class="nav-item">
                <a class="btn btn-dark" href="adminsendalert.html">Send Alert</a>
              </li><br><br><br>
        </ul>
    </div>

    <div id="content"></div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadContent('admindashboard');
        });

        document.addEventListener('DOMContentLoaded', function() {
            loadContent('admindashboard');

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