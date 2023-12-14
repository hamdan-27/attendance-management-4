<?php

require('connection.php');


session_start();


if (isset($_POST['submit'])) {

    $alert = mysqli_real_escape_string($conn, $_POST['alert']);


    $user_email = $_SESSION['email'];
    $query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $row = mysqli_fetch_assoc($result);
        $user_fname = $row['user_fname'];


        $date = date('Y-m-d H:i:s');

     
        $insertQuery = "INSERT INTO notifications (user_fname, alert, date) 
                        VALUES ('$user_fname', '$alert', '$date')";
        
        $insertResult = mysqli_query($conn, $insertQuery);

         // Inserting into teachernotifications table
        $teacherInsertQuery = "INSERT INTO teachernotifications (user_fname, student_name, alert, date) 
                               VALUES ('$user_fname', '', 'You have sent this alert: $alert', '$date')";
        $teacherInsertResult = mysqli_query($conn, $teacherInsertQuery);

        if ($insertResult && $teacherInsertResult) {
            echo "<script>alert('Alert submitted successfully')</script>";
            echo "<script>window.open('teacherpanel.php','_self')</script>";
        } else {
            echo "<script>alert('Sorry, an error occurred: " . mysqli_error($conn) . "')</script>";
        }
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
    }
}

mysqli_close($conn);
?>
