<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database (update with your database details)
    include 'db.php';

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Function to sanitize input data
    function sanitizeData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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
    $userpassword = sanitizeData($_POST['user_password']);
    
    // Check if username already exists
    $check_username_query = "SELECT * FROM lamora_user WHERE username='$username'";
    $result_username = mysqli_query($conn, $check_username_query);
    if (mysqli_num_rows($result_username) > 0) {
        // Username already exists, redirect back to signup page with error message
        header("Location: signup.html?error=username_exists");
        exit();
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM lamora_user WHERE email='$email'";
    $result_email = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($result_email) > 0) {
        // Email already exists, redirect back to signup page with error message
        header("Location: signup.html?error=email_exists");
        exit();
    }

    // Check if phone already exists
    $check_phone_query = "SELECT * FROM lamora_user WHERE phone='$phone'";
    $result_phone = mysqli_query($conn, $check_phone_query);
    if (mysqli_num_rows($result_phone) > 0) {
        // Phone already exists, redirect back to signup page with error message
        header("Location: signup.html?error=phone_exists");
        exit();
    }
    
    // Insert data into users table
    $query = "INSERT INTO lamora_user (firstname, lastname, email, phone, address1, address2, city, state, country, zipcode, dob, username, user_password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$address1', '$address2', '$city', '$state', '$country', '$zipcode', '$dob', '$username', '$userpassword')";

    if (mysqli_query($conn, $query)) {
        // Signup successful, redirect to signup success page
        header("Location: signup_success.html");
        exit();
    } else {
        // Error occurred, redirect back to signup page with error message
        header("Location: signup.html?error=signup_failed");
        exit();
    }

    mysqli_close($conn);
}
?>
