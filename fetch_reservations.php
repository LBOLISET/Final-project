<?php
include 'db.php';

// Fetch room reservations
$sql = "SELECT reservation_id, username, first_name, last_name, room_type, check_in_date, check_out_date FROM reservations";
$result = $conn->query($sql);

$reservations = [];

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();

// Return reservations as JSON
header('Content-Type: application/json');
echo json_encode($reservations);
?>
