<?php

// Database connection settings
include 'db.php';

// Get form data
$staff_id = $_POST['staff_id'];
$password = $_POST['password'];


// SQL query to fetch staff by staff_id
$sql = "SELECT * FROM lamora_staff WHERE staff_id = '$staff_id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $staff = $result->fetch_assoc();

    if ($staff && $password === $staff['password']) {
        // Authentication successful, redirect to dashboard
        header("Location: staff_dashboard.html");
        exit();
    } else {
        // Authentication failed, display error message
        echo "<script>alert('Invalid staff_id or password');</script>";
        echo "<script>window.location.href = 'staff_login.html';</script>";
    }
} else {
    // No matching user found, display error message
    echo "<script>alert('Invalid staff_id or password');</script>";
    echo "<script>window.location.href = 'staff_login.html';</script>";
}

$conn->close();
?>
