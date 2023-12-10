<?php
require("teacherloginprocess.php");
if (!isset($_SESSION['loggedin'])) { 
    header('Location: teacherlogin.php');
    exit();
} 

require('connection.php');

$user_email = $_SESSION['email'];
$query = "SELECT user_fname FROM users WHERE user_email = '$user_email'";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $user_fname = $row['user_fname'];

    echo "<br><br><center><h1>Welcome Back, $user_fname!</h1> <h5>Generate past/present attendance reports</h5> <hr></center>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generate pdf</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                <h2>Generate the whole student attendance report</h2>
    
                <form class="form-inline" method="post" action="generate_pdf.php">
                    <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary">
                        <i class="fa fa-pdf" aria-hidden="true"></i>
                        Generate PDF
                    </button>
                </form> 
                <br>
    
                <!-- form for generating Excel  -->
                <form class="form-inline" method="post" action="generate_excel.php">
                    <button type="submit" id="excel" name="generate_excel" class="btn btn-success">
                        <i class="fa fa-file-excel" aria-hidden="true"></i>
                        Download Excel
                    </button>
                </form>
            </div>
        </div>
    </div>
    

<!--  box for generating teacher's report -->
<div class="card mt-3">
    <div class="card-body">
        <h2>Generate your class attendance report</h2>

        <form class="form-inline" method="post" action="generate_teacher_report.php">
            <button type="submit" id="teacherPdf" name="generate_teacher_pdf" class="btn btn-primary">
                <i class="fa fa-pdf" aria-hidden="true"></i>
                Generate PDF
            </button>
        </form>
    
<br>

<form class="form-inline" method="post" action="generate_teacher_report_excel.php">
    <button type="submit" id="excel" name="generate__teacher_excel" class="btn btn-success">
        <i class="fa fa-file-excel" aria-hidden="true"></i>
        Download Excel
    </button>
</form>
</div>
</div>
</div>
</div>
</div>



<!-- Box for generating attendance report by date -->
<div class="card mt-3">
    <div class="card-body">
        <h2>Generate attendance report by date</h2>

        <!-- PDF Form -->
        <form class="form-inline" method="post" action="generate_date_report.php">
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputDate" class="sr-only">Select Date:</label>
                <input type="date" class="form-control" id="inputDate" name="attendance_date" required>
            </div>
            <button type="submit" id="datePdf" name="generate_date_pdf" class="btn btn-primary">
                <i class="fa fa-pdf" aria-hidden="true"></i>
                Generate PDF
            </button>
        </form>

        <!-- Excel Form -->
        <form class="form-inline mt-3" method="post" action="generate_date_report_excel.php">
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputDateExcel" class="sr-only">Select Date:</label>
                <input type="date" class="form-control" id="inputDateExcel" name="attendance_date_excel" required>
            </div>
            <button type="submit" id="excel" name="generate_date_excel" class="btn btn-success">
                <i class="fa fa-file-excel" aria-hidden="true"></i>
                Download Excel
            </button>
        </form>
    </div>
</div>


<!-- Box for generating attendance report by subject (class) -->
<div class="card mt-3">
    <div class="card-body">
        <h2>Generate attendance report by subject (class)</h2>

        <!-- PDF Form -->
        <form class="form-inline" method="post" action="generate_subject_report.php">
            <div class="form-group mx-sm-3 mb-2">
                <label for="selectClass" class="sr-only">Select Class:</label>
                <select class="form-control" id="selectClass" name="selected_class" required>
                    <?php
                    // Fetch classes for the logged-in teacher
                    $teacher_classes_query = "SELECT class_name FROM class";
                    $teacher_classes_result = mysqli_query($conn, $teacher_classes_query);

                    if ($teacher_classes_result) {
                        while ($class_row = mysqli_fetch_assoc($teacher_classes_result)) {
                            $class_name = $class_row['class_name'];
                            echo "<option value='$class_name'>$class_name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" id="subjectPdf" name="generate_subject_pdf" class="btn btn-primary">
                <i class="fa fa-pdf" aria-hidden="true"></i>
                Generate PDF
            </button>
        </form>

      
<form class="form-inline mt-3" method="post" action="generate_subject_report_excel.php">
    <div class="form-group mx-sm-3 mb-2">
        <label for="selectClass" class="sr-only">Select Class:</label>
        <select class="form-control" id="selectClass" name="selected_class" required>
                    <?php
                    // Re-fetch classes for the logged-in teacher (for Excel form)
                    mysqli_data_seek($teacher_classes_result, 0); // Reset pointer to the beginning
                    if ($teacher_classes_result) {
                        while ($class_row = mysqli_fetch_assoc($teacher_classes_result)) {
                            $class_name = $class_row['class_name'];
                            echo "<option value='$class_name'>$class_name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" id="excel" name="generate_subject_excel" class="btn btn-success">
                <i class="fa fa-file-excel" aria-hidden="true"></i>
                Download Excel
            </button>
        </form>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <h2>Generate attendance list on the basis of student name</h2>

        <!-- PDF Form -->
        <form class="form-inline" method="post" action="generate_student_report.php">
            <div class="form-group mx-sm-3 mb-2">
                <label for="selectStudent" class="sr-only">Select Student:</label>
                <select class="form-control" id="selectStudent" name="selected_student" required>
                    <?php
                    // Fetching students for the logged-in teacher
                    $teacher_name = $user_fname;
                    $students_query = "SELECT DISTINCT attendance_student FROM attendance";
                    $students_result = mysqli_query($conn, $students_query);

                    if ($students_result) {
                        while ($student_row = mysqli_fetch_assoc($students_result)) {
                            $student_name = $student_row['attendance_student'];
                            echo "<option value='$student_name'>$student_name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" id="studentPdf" name="generate_student_pdf" class="btn btn-primary">
                <i class="fa fa-pdf" aria-hidden="true"></i>
                Generate PDF
            </button>
        </form>

        <!-- Excel Form -->
        <form class="form-inline" method="post" action="generate_student_report_excel.php">
            <div class="form-group mx-sm-3 mb-2">
                <label for="selectStudent" class="sr-only">Select Student:</label>
                <select class="form-control" id="selectStudent" name="selected_student" required>
                    <?php
                    // Fetching students for the logged-in teacher
                    $teacher_name = $user_fname;
                    $students_query = "SELECT DISTINCT attendance_student FROM attendance";
                    $students_result = mysqli_query($conn, $students_query);

                    if ($students_result) {
                        while ($student_row = mysqli_fetch_assoc($students_result)) {
                            $student_name = $student_row['attendance_student'];
                            echo "<option value='$student_name'>$student_name</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" id="excel" name="generate_student_excel" class="btn btn-success">
                Download Excel
            </button>
        </form>
    </div>
</div>

            
<style>
    hr {
        width: 90%;
        margin-top: 20px;
        margin-bottom: 20px;
        border-color: #b8b8b8;
        border-width: 5px;
    }
</style>

</body>
</html>
