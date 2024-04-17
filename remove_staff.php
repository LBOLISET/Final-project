<?php
// Include the database connection file
include 'db.php';

// Check if the action parameter is set and equal to "remove"
if(isset($_GET['action']) && $_GET['action'] === 'remove') {
    // Check if the remove_staff_id parameter is set
    if(isset($_POST['remove_staff_id'])) {
        // Sanitize the input to prevent SQL injection
        $staff_id = mysqli_real_escape_string($connection, $_POST['remove_staff_id']);

        // SQL query to delete the staff member by ID
        $sql = "DELETE FROM lamora_staff WHERE staff_id = '$staff_id'";

        // Execute the query
        if(mysqli_query($connection, $sql)) {
            // Close the database connection
            mysqli_close($connection);
            
            // Print JavaScript alert and redirect after a delay
            echo "<script>";
            echo "alert('Staff member successfully deleted.');";
            echo "setTimeout(function() { window.location.href = 'manage_staff.html'; }, 1000);"; // Redirect after 1 second
            echo "</script>";
            exit; // Stop further execution
        } else {
            // If deletion fails, display an error message
            echo "Error deleting record: " . mysqli_error($connection);
        }
    } else {
        // If remove_staff_id parameter is not set, display an error message
        echo "staff ID not provided.";
    }
} else {
    // If action parameter is not set or not equal to "remove", display an error message
    echo "Invalid action.";
}

// Close the database connection
mysqli_close($connection);
?>
