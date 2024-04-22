<?php
// Include your database conn file
require_once 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $staff_id = $_POST["staff_id"];
    $dob = $_POST["dob"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Invalid username or dob. Please enter valid details'); window.location.href = 'staff_reset.html';</script>";
    }

    // Sanitize input to prevent SQL injection
    $staff_id = mysqli_real_escape_string($conn, $staff_id);
    $dob = mysqli_real_escape_string($conn, $dob);

    // Query to check if staff_id and date of birth match
    $query = "SELECT * FROM lamora_staff WHERE staff_id = '$staff_id' AND dob = '$dob'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // staff_id and date of birth match, update the password
        $updateQuery = "UPDATE lamora_staff SET password = '$newPassword' WHERE staff_id = '$staff_id' AND dob = '$dob'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Password updated successfully'); window.location.href = 'staff_login.html';</script>";
        } else {
            echo "Error updating password: " . mysqli_error($conn);
            header("Location: staff_reset.html");
        }
    } else {
        echo "<script>alert('Invalid staff_id or dob. Please enter valid details'); window.location.href = 'staff_reset.html';</script>";
    }

    // Close database conn
    mysqli_close($conn);
}
?>
