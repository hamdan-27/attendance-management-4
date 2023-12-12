<?php
require('adminloginprocess.php');

if (!isset($_SESSION['loggedin'])) { 
    header('Location: adminlogin.php');
    exit();
} 

require('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $course_manager_name = $_POST['course_manager_name'];

    // Perform validation if needed

    // Insert data into the attendance table
    $insert_query = "INSERT INTO course VALUES (NULL, '$course_name', '$course_manager_name')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        echo "<br><br><center><h3>Course added successfully!</h3></center>";
        
        // Redirect to adminpanel.php after a successful insert
        header('Location: adminpanel.php');
        exit();
    } else {
        echo "<br><br><center><h3>Error adding course.</h3></center>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylesignup.css">
</head>
<body>
    <section class="container">
        <header>Add New Course</header>
        <form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-box">
                <label for="course_name">Course Name</label>
                <input type="text" class="form-control" name="course_name" required>
            </div>
            <div class="form-group">
                <label for="course_manager_name">Course Manager</label>
                <input type="text" class="form-control" name="course_manager_name" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
</section>
</body>
</html>