<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // Validate input
    if (empty($username) || empty($dob) || empty($phone)) {
        echo "Please fill in all fields!";
        exit();
    }

    // Query to check user details
    $sql = "SELECT * FROM lamora_user WHERE username = '$username' AND dob = '$dob' AND phone = '$phone'";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Match found, proceed to reset password
            session_start();
            $_SESSION['username'] = $username;
            header("Location: user_update_password.html");  // Redirect to reset password page
        } else {
            // No match found
            echo "Invalid details. Please try again!";
        }

        $stmt->close();
        $conn->close();

    } catch (mysqli_sql_exception $e) {
        echo "SQL Error: " . $e->getMessage();
    }
}
?>