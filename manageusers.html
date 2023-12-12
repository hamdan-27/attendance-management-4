<!DOCTYPE html>
<html lang="en">


<?php
require_once('connection.php');

function edit_user()
{
  global $conn;

  $sql = "SELECT * FROM users;";
  $result = mysqli_query($conn, $sql);
  $final = mysqli_num_rows($result);
  if ($final > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $name = $row['user_fname'];
      $email = $row['user_email'];
      $phone = $row['phone_number'];
      $user_role = $row['user_role'];
      $password = $row['user_password'];
      $class_name = $row['class_name'];

      echo "<tr>
              <form method='post'>
                <td><input name='name' class='form-control' value='$name'></td>
                <td><input name='email' class='form-control' value='$email'></td>
                <td><input name='phone' class='form-control' value='$phone'></td>
                <td><input name='user_role' class='form-control' value='$user_role'></td>
                <td><input name='password' class='form-control' value='$password'></td>
                <td><input name='class_name' class='form-control' value='$class_name'></td>
                <td><input type='submit' name='edit-user' class='btn btn-primary' value='Edit'></td>
              </form>
            </tr>";
    }
  } else {
    echo "<script>alert('No users found');</script>";
  }
}

if (isset($_POST['edit-user'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $user_role = $_POST['user_role'];
  $password = $_POST['password'];
  $class_name = $_POST['class_name'];

  $sql = "UPDATE `user` 
  SET `user_fname`='$name',`user_email`='$email',`phone_number`='$phone',`user_role`='$user_role',`user_password`='$password' , `class_name`='$class_name'
  WHERE `id` = '$id'";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert('User Updated Succesfully.')</script>";
    echo "<script>window.open('adminpanel.php','_self')</script>";
  } else {

    echo "<script>alert('Sorry an error occurred')</script>";
    // echo "<script>window.open('admin_panel.php','_self')</script>";
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
  <script src="js/adminpanelscript.js"></script>
  <script src="https://kit.fontawesome.com/2ba669933d.js" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

  
 
</head>

<body>
  <center>
    <h1>Manage Users</h1>
  </center>

  <section class="inner-page">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">User Role</th>
                <th scope="col">Password</th>
                <th scope="col">Class Name</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              <?php edit_user() ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

</body>

</html>