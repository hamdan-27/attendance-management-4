<?php
// Include the database connection file
include('connection.php');

// Fetch data from the notifications table
$query = "SELECT * FROM notifications";
$result = mysqli_query($connection, $query);

$data = array();

// Fetch the data as an associative array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);

// Close the database connection
mysqli_close($connection);
?>
