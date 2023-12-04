<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $user_fname = $_POST['first_name'];
    $user_email = $_POST['email'];
    $note = $_POST['note'];
    $class = $_POST['class'];

 
    date_default_timezone_set('Asia/Dubai');

   
    $submission_date = date('Y-m-d');
    $submission_time = date('g:i A');

    $sql = "INSERT INTO absent (user_fname, user_email, class, note, date, time) 
            VALUES ('$user_fname', '$user_email', '$class', '$note', '$submission_date', '$submission_time')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Application submitted successfully')</script>";
        echo "<script>window.open('studentpanel.php','_self')</script>";
    } else {
        echo "<script>alert('Sorry, an error occurred: " . mysqli_error($conn) . "')</script>";
    }
} else {
    echo "Fields required";
}
?>
