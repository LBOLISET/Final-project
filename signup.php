<?php
// Include the database connection file
require_once 'db.php';

// Function to sanitize input data
function sanitizeData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $firstname = sanitizeData($_POST['firstname']);
    $lastname = sanitizeData($_POST['lastname']);
    $email = sanitizeData($_POST['email']);
    $phone = sanitizeData($_POST['phone']);
    $address1 = sanitizeData($_POST['user_address1']);
    $address2 = sanitizeData($_POST['user_address2']);
    $city = sanitizeData($_POST['usercity']);
    $state = sanitizeData($_POST['userstate']);
    $country = sanitizeData($_POST['user_country']);
    $zipcode = sanitizeData($_POST['userzipcode']);
    $dob = sanitizeData($_POST['dob']);
    $username = sanitizeData($_POST['username']);
    $password = sanitizeData($_POST['user_password']); // Store password as plain text

    // Check if username already exists
    $stmt = $conn->prepare("SELECT username FROM lamora_user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        // Username already exists, redirect back to signup page with error message
        header("Location: signup.html?error=username_exists");
        exit();
    }
    $stmt->close();

    // Insert user data into database
    $stmt = $conn->prepare("INSERT INTO lamora_user (firstname, lastname, email, phone, address1, address2, city, state, country, zipcode, dob, username, user_password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$address1', '$address2', '$city', '$state', '$country', '$zipcode', '$dob', '$username', '$password')");
    $stmt->execute();
    $stmt->close();

    // Redirect to success page
    header("Location: signup_success.html");
    exit();
} else {
    // If the form was not submitted, redirect back to signup page
    header("Location: signup.html");
    exit();
}
?>
