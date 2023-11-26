<?php 
session_start();
require('connection.php');

if(isset($_POST['loginsubmit'])){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    // Add a condition to check for 'admin' role
    $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' AND user_role = 'admin'";
    
    $result = mysqli_query($conn, $sql);
    $final = mysqli_num_rows($result);

    if($final > 0){
        while ($row = mysqli_fetch_array($result)) {
            // Fetch info from the database
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] =  $row['user_email'];
            $_SESSION['password'] =  $row['user_password'];
            
            header("Location: adminpanel.php");
        }
    } else {
        // Check if the user exists
        $sql_check_user = "SELECT * FROM users WHERE user_email = '$user_email'";
        $result_check_user = mysqli_query($conn, $sql_check_user);
        $final_check_user = mysqli_num_rows($result_check_user);

        if($final_check_user > 0){
            // User exists, but role is not 'admin'
            echo "<script>alert('Only admin can login')</script>";
        } else {
            // Incorrect login credentials
            echo "<script>alert('Please enter correct details')</script>";
        }

        echo "<script>window.open('adminlogin.php','_self')</script>";
    }
}
?>
