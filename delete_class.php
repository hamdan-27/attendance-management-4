<?php
require('teacherloginprocess.php');
if (!isset($_SESSION['loggedin'])){ 
    header('Location: teacherlogin.php');
    exit();
} 
?>

<?php
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $class_id = mysqli_real_escape_string($conn, $_POST['class_id']);


    $select_query = "SELECT * FROM class WHERE class_id = '$class_id'";
    $select_result = mysqli_query($conn, $select_query);
    $class_data = mysqli_fetch_assoc($select_result);


    $delete_query = "DELETE FROM class WHERE class_id = '$class_id'";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo "Class deleted successfully!";
        
        // Geting the logged-in teacher's first name
        $user_email = $_SESSION['email'];

        $query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
        $result = mysqli_query($conn, $query);

        if ($result) {
         
            $row = mysqli_fetch_assoc($result);
            $user_fname = $row['user_fname'];

            // Insert data into notifications table
            $alert = "Class with ID $class_id (Class Name: {$class_data['class_name']}) was cancelled by: {$class_data['class_tutor_name']}";
            $date = date("Y-m-d H:i:s");

            $insert_notification_query = "INSERT INTO notifications (user_fname, alert, date) VALUES ('$user_fname', '$alert', '$date')";
            $insert_notification_result = mysqli_query($conn, $insert_notification_query);

            if (!$insert_notification_result) {
                echo "Error inserting notification: " . mysqli_error($conn);
            }

            // Redirect to teacherpanel.php after successful deletion
            header('Location: teacherpanel.php');
            exit();
        } else {
            echo "Error fetching teacher data: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting class: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method!";
}
?>
