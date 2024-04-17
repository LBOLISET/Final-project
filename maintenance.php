<?php
// Include the database connection file
include 'db.php';

// Retrieve form data
$room_number = $_POST['room_number'];
$maintenance_issue = $_POST['maintenance_issue'];
$maintenance_status = $_POST['maintenance_status'];

// SQL query to insert data into the Maintenance table
$sql = "INSERT INTO maintenance (room_number, maintenance_issue, maintenance_status)
        VALUES ('$room_number', '$maintenance_issue', '$maintenance_status')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Maintenance request submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
