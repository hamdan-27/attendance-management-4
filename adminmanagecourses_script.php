<?php
require_once('connection.php');

function update_course()
{
    global $conn;

    $sql = "SELECT * FROM course;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_manager = $row['course_manager_name'];

            echo "<tr>
                <form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='post'>
                    <td><input type='hidden' name='course_id' class='form-control' value='$course_id' readonly></td>
                    <td><input name='course_name' class='form-control' value='$course_name'></td>
                    <td><input name='course_manager' class='form-control' value='$course_manager'></td>
                    <td><button type='submit' name='update-course' class='btn btn-warning'>Update</button></td>
                    <td><button type='submit' name='delete-course' class='btn btn-danger'>Delete</button></td>
                </form>
            </tr>";
        }
    } else {
        echo "<script>alert('No Courses Found.');</script>";
    }
}

function delete_course()
{
    global $conn;

    $sql = "SELECT * FROM course;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_manager = $row['course_manager_name'];

            echo "<tr>
                <form action=\"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method='post'>
                    <td><input type='hidden' name='course_id' class='form-control' value='$course_id' readonly></td>
                    <td><input name='course_name' class='form-control' value='$course_name' readonly></td>
                    <td><input name='course_manager' class='form-control' value='$course_manager' readonly></td>
                    <td><button type='submit' name='delete-course' class='btn btn-danger'>Delete</button></td>
                </form>
            </tr>";
        }
    } else {
        echo "<script>alert('No Courses Found.');</script>";
    }
}
?>