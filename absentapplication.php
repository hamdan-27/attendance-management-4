<?php
require('connection.php');

if (isset($_POST['submit'])) {

    $user_fname = $_POST['first_name'];
    $user_email = $_POST['email'];
    $note = $_POST['note'];

    $sql = "INSERT INTO absent (user_fname, user_email, note) 
            VALUES ('$user_fname', '$user_email', '$note')";

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
