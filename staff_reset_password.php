<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staff_id = $_POST['staff_id'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    // Validate input
    if (empty($staff_id) || empty($dob) || empty($phone)) {
        echo "Please fill in all fields!";
        exit();
    }

    // Query to check user details
    $sql = "SELECT * FROM lamora_staff WHERE staff_id = '$staff_id' AND dob = '$dob' AND phone = '$phone'";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Match found, proceed to reset password
            session_start();
            $_SESSION['staff_id'] = $staff_id;
            header("Location: staff_update_password.html");  // Redirect to reset password page
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