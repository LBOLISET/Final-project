<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = $_POST['reservation_id'];
    $check_in_date = date('Y-m-d', strtotime($_POST['check_in_date']));
    $check_out_date = date('Y-m-d', strtotime($_POST['check_out_date']));

    // Prepare an SQL statement
    $sql = "UPDATE reservations SET check_in_date=?, check_out_date=? WHERE reservation_id=?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Prepare failed: " . $conn->error;
        exit();
    }

    // Bind the parameters
    $stmt->bind_param("ssi", $check_in_date, $check_out_date, $reservation_id);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            echo "Reservation updated successfully";
        } else {
            echo "No reservation found with that ID";
        }
    } else {
        echo "Error updating reservation: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
