<?php
// Include your database conn file
require_once 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $dob = $_POST["dob"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate if new password and confirm password match
    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.location.href = 'manager_reset.html';</script>";
    }

    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $dob = mysqli_real_escape_string($conn, $dob);

    // Query to check if username and date of birth match
    $query = "SELECT * FROM managers WHERE username = '$username' AND dob = '$dob'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // username and date of birth match, update the password
        $updateQuery = "UPDATE managers SET password = '$newPassword' WHERE username = '$username' AND dob = '$dob'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Password updated successfully'); window.location.href = 'manager_login.html';</script>";
        } else {
            echo "Error updating password: " . mysqli_error($conn);
            header("Location: manager_reset.html");
        }
    } else {
        echo "<script>alert('Invalid username or dob. Please enter valid details'); window.location.href = 'manager_reset.html';</script>";
    }

    // Close database conn
    mysqli_close($conn);
}
?>
