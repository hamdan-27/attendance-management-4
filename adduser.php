<?php
require('connection.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $user_fname = $_POST['full-name'];
    $user_email = $_POST['email-address'];
    $phone_number = $_POST['phone-number'];
    $user_role = $_POST['role'];
    $user_password = $_POST['password'];
    $user_confirmpassword = $_POST['confirm-password'];

    // Specify the columns in the INSERT statement
    $sql = "INSERT INTO users (user_fname, user_email, phone_number, user_role, user_password, user_confirmpassword) 
            VALUES ('$user_fname', '$user_email', '$phone_number', '$user_role', '$user_password', '$user_confirmpassword')";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check for errors in query execution
    if ($result) {
        echo "<script>alert('New Users Registered Successfully')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
    } else {
        echo "<script>alert('Sorry an error occurred: " . mysqli_error($conn) . "')</script>";
    }
} else {
    echo "Fields required";
}
?>
