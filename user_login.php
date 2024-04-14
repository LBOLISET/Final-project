<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "db.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM lamora_user WHERE username='$username' AND password='$password'");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header( 'Location: booking.html' ) ;
        }
    } else {
        // Invalid login credentials, show error message
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
?>
