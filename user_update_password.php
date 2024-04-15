<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $username = $_POST['username'] ?? '';
    
    // Check if passwords and username are not empty
    if (!empty($new_password) && !empty($confirm_password) && !empty($username)) {
        
        // Check if passwords match
        if ($new_password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!');</script>";
            echo "<script>window.location.href = 'user_update_password.html';</script>";
            exit();
        }

        // Update the password in the database
        $sql = "UPDATE lamora_user SET password = '$new_password' WHERE username = '$username'";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Password updated successfully!');</script>";
            echo "<script>window.location.href = 'user_login.html';</script>";
        } else {
            echo "<script>alert('Error updating password. Please try again later.');</script>";
            echo "<script>window.location.href = 'user_update_password.html';</script>";
        }

        mysqli_close($conn);
    } else {
        echo "<script>alert('Please fill in all fields!');</script>";
        echo "<script>window.location.href = 'user_update_password.html';</script>";
    }
} else {
    header("Location: user_update_password.html"); // Redirect if accessed directly
}
?>
