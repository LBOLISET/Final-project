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
        echo "Staff ID not provided.";
    }
} else {
    // If action parameter is not set or not equal to "remove", display an error message
    echo "Invalid action.";
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Staff Member</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this staff member?");
        }
    </script>
</head>
<body>
    <h2>Delete Staff Member</h2>
    <form action="remove_staff.php?action=remove" method="post" onsubmit="return confirmDelete();">
        <label for="remove_staff_id">Staff ID:</label>
        <input type="text" id="remove_staff_id" name="remove_staff_id" required>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
