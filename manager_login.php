<?php

// Database connection settings
include 'db.php';

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];


// SQL query to fetch manager by username
$sql = "SELECT * FROM managers WHERE username = '$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $manager = $result->fetch_assoc();

    if ($manager && $password === $manager['password']) {
        // Authentication successful, redirect to dashboard
        header("Location: manager_dashboard.html");
        exit();
    } else {
        // Authentication failed, display error message
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href = 'manager_login.html';</script>";
    }
} else {
    // No matching user found, display error message
    echo "<script>alert('Invalid username or password');</script>";
    echo "<script>window.location.href = 'manager_login.html';</script>";
}

$conn->close();
?>
