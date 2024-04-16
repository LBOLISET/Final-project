<?php
// Include db.php file
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $roomNumber = $_POST["roomNumber"];
    $maintenanceIssue = $_POST["maintenanceIssue"];
    $maintenanceStatus = $_POST["maintenanceStatus"];

    // Insert data into the database
    $sql = "INSERT INTO maintenance_requests (room_number, maintenance_issue, maintenance_status) VALUES ('$roomNumber', '$maintenanceIssue', '$maintenanceStatus')";
    if (mysqli_query($conn, $sql)) {
        echo "Maintenance request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>