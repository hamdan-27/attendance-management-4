<?php
include('connection.php');

// Fetching data from the notifications table
$query = "SELECT * FROM notifications";
$result = mysqli_query($connection, $query);

$data = array();

// Fetching the data as an associative array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}


echo json_encode($data);


mysqli_close($connection);
?>
