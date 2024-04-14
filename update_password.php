<?php
// Database connection
include 'db.php';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate passwords
    if ($newPassword != $confirmPassword) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Assuming the username is passed as a hidden field or session variable
    session_start();
    $username = $_SESSION['username'];

    // Update password in the database
    $sql = "UPDATE users SET password = '$hashedPassword' WHERE username = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashedPassword, $username);

    if ($stmt->execute()) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
