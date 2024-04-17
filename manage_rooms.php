<?php
include 'db.php';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_number = $_POST["room_number"];
    $price = !empty($_POST["price"]) ? $_POST["price"] : null;
    $available_from_input = !empty($_POST["available_from"]) ? date("Y-m-d", strtotime($_POST["available_from"])) : null;
    $available_to_input = !empty($_POST["available_to"]) ? date("Y-m-d", strtotime($_POST["available_to"])) : null;

    // Fetch existing dates from the database
    $stmt_fetch = $conn->prepare("SELECT AvailableFrom, AvailableTo FROM Rooms WHERE RoomNumber = '$room_number'");
    $stmt_fetch->execute();
    $result = $stmt_fetch->get_result();
    $row = $result->fetch_assoc();
    $available_from_db = $row['AvailableFrom'];
    $available_to_db = $row['AvailableTo'];

    $stmt_fetch->close();

    // Check if the input dates are valid
    if (($available_from_input && $available_to_input && $available_from_input > $available_to_input) || 
        ($available_from_db && $available_to_input && $available_from_db > $available_to_input) ||
        ($available_to_db && $available_from_input && $available_to_db < $available_from_input)) {
        echo "<script>alert('Invalid date range. Please correct the dates.');</script>";
        echo "<script>window.location.href = 'manage_rooms.html';</script>";
        exit; // Stop further execution
    }

    // Prepare and execute the update query
    if ($price !== null && ($available_from_input !== null || $available_to_input !== null)) {
        $sql = "UPDATE Rooms SET Price = '$price', AvailableFrom = '$available_from_input', AvailableTo = '$available_to_input' WHERE RoomNumber = '$room_number'";
        $stmt = $conn->prepare($sql);
    } elseif ($price !== null) {
        $sql = "UPDATE Rooms SET Price = '$price' WHERE RoomNumber = '$room_number'";
        $stmt = $conn->prepare($sql);
    } elseif ($available_from_input !== null || $available_to_input !== null) {
        $sql = "UPDATE Rooms SET AvailableFrom = '$available_from_input', AvailableTo = '$available_to_date' WHERE RoomNumber = '$room_number'";
        $stmt = $conn->prepare($sql);
    } else {
        echo "<script>alert('No fields provided for update.');</script>";
        echo "<script>window.location.href = 'manage_rooms.html';</script>";
        exit; // Stop further execution
    }

    if ($stmt->execute()) {
        echo "<script>alert('Room rate and availability updated successfully!');</script>";
        echo "<script>window.location.href = 'manage_rooms.html';</script>";
    } else {
        echo "<script>alert('Error executing SQL: " . $stmt->error . "');</script>";
        echo "<script>window.location.href = 'manage_rooms.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
