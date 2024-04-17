<?php
include 'db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['reservation_id'];

    // Prepare an SQL statement
    $sql = "DELETE FROM reservations WHERE reservation_id = '$reservation_id";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Prepare failed: " . $conn->error;
        exit();
    }

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            echo "Reservation canceled successfully";
        } else {
            echo "No reservation found with that ID";
        }
    } else {
        echo "Error canceling reservation: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
