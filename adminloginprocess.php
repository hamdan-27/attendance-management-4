<?php 
session_start();
require('connection.php');

if(isset($_POST['loginsubmit'])){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password' AND user_role = 'admin'";
    
    $result = mysqli_query($conn, $sql);
    $final = mysqli_num_rows($result);

    if($final > 0){
        while ($row = mysqli_fetch_array($result)) {
            
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] =  $row['user_email'];
            $_SESSION['password'] =  $row['user_password'];
            
            header("Location: adminpanel.php");
        }
    } else {
     
        $sql_check_user = "SELECT * FROM users WHERE user_email = '$user_email'";
        $result_check_user = mysqli_query($conn, $sql_check_user);
        $final_check_user = mysqli_num_rows($result_check_user);

        if($final_check_user > 0){
        
            echo "<script>alert('Only admin can login')</script>";
        } else {
       
            echo "<script>alert('Please enter correct details')</script>";
        }

        echo "<script>window.open('adminlogin.php','_self')</script>";
    }
}
?>
