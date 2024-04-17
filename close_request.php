<?php
// Include the database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'close' button was clicked
    if (isset($_POST['close'])) {
        // Get the request ID from the form
        $request_id = $_POST['request_id'];

        // Update the maintenance request status to 'closed'
        $sql = "UPDATE maintenance SET maintenance_status = 'closed' WHERE request_id = '$request_id'";

        // Execute the update query
        if (mysqli_query($conn, $sql)) {
            echo "Maintenance request closed successfully.";
        } else {
            echo "Error updating maintenance request: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
