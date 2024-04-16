<?php
// Establish database connection (assuming db.php contains connection code)
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $job_title = $_POST['job_title'];
    $employment_status = $_POST['employment_status'];
    $start_date = $_POST['start_date'];
    $department = $_POST['department'];
    $supervisor = $_POST['supervisor'];
    $staff_id = $_POST['staff_id'];
    $password = $_POST['password'];
    $emergency_contact_name = $_POST['emergency_contact_name'];
    $relationship = $_POST['relationship'];
    $emergency_contact_phone = $_POST['emergency_contact_phone'];

    // Check if staff_id already exists
    $sql_check_staff_id = "SELECT * FROM staff WHERE staff_id='$staff_id'";
    $result_check_staff_id = mysqli_query($conn, $sql_check_staff_id);
    if (mysqli_num_rows($result_check_staff_id) > 0) {
        echo "<script>alert('Staff ID already exists!')</script>";
    } else {
        // Check if phone number already exists
        $sql_check_phone = "SELECT * FROM staff WHERE phone='$phone'";
        $result_check_phone = mysqli_query($conn, $sql_check_phone);
        if (mysqli_num_rows($result_check_phone) > 0) {
            echo "<script>alert('Phone number already exists!')</script>";
        } else {
            // Insert new staff data into the database
            $sql_insert_staff = "INSERT INTO staff (firstname, lastname, gender, dob, nationality, email, phone, address, job_title, employment_status, start_date, department, supervisor, staff_id, password, emergency_contact_name, relationship, emergency_contact_phone) VALUES ('$firstname', '$lastname', '$gender', '$dob', '$nationality', '$email', '$phone', '$address', '$job_title', '$employment_status', '$start_date', '$department', '$supervisor', '$staff_id', '$password', '$emergency_contact_name', '$relationship', '$emergency_contact_phone')";
            if (mysqli_query($conn, $sql_insert_staff)) {
                header("Location: staff_register_success.html");
                exit();
            } else {
                echo "Error: " . $sql_insert_staff . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>
