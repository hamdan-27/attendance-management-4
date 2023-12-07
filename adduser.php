<?php
require('connection.php');


if (isset($_POST['submit'])) {
 
    $user_fname = $_POST['full-name'];
    $user_email = $_POST['email-address'];
    $phone_number = $_POST['phone-number'];
    $user_role = $_POST['role'];
    $user_password = $_POST['password'];
    $user_confirmpassword = $_POST['confirm-password'];


    $sql = "INSERT INTO users (user_fname, user_email, phone_number, user_role, user_password) 
            VALUES ('$user_fname', '$user_email', '$phone_number', '$user_role', '$user_password')";

    $result = mysqli_query($conn, $sql);

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
