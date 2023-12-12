<!DOCTYPE html>
<html lang="en">

<?php
require("adminloginprocess.php");
if (!isset($_SESSION['loggedin'])) {
    header('Location: adminlogin.php');
    exit();
}

include('adminmanagecourses_script.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-course'])) {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_manager = $_POST['course_manager'];

    $update_sql = "UPDATE `course`
    SET `course_name` = '$course_name', `couse_manager_name` = '$course_manager'
    WHERE `course_id` = '$course_id';";

    $update_result = mysqli_query($conn, $update_sql);
    if ($update_result) {
        echo "<script>alert('Course Updated Succesfully');</script>";
    } else {
        echo "<script> alert('Sorry, there was a problem updating the course.'); </script>";
    }
}

if (isset($_POST['delete-course'])) {
    echo "<script>alert('Works');</script>";
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Courses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="card mt-3">
        <div class="card-body">
            <h2>Edit Courses</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Course ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Manager</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php update_course() ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h2>Delete Courses</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Course ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Manager</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php delete_course() ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>