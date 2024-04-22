<?php
// Include the database connection file
include 'db.php';

// Fetch room details based on room number (assuming room number is passed as a POST parameter)
if (isset($_POST['room_number'])) {
    // Get room number from the POST data
    $room_number = $_POST['room_number'];

    // Query to fetch room details based on room number
    $query = "SELECT * FROM Rooms WHERE room_number = '$room_number'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Check if room details are found
        if (mysqli_num_rows($result) > 0) {
            // Fetch room details
            $room_details = mysqli_fetch_assoc($result);
?>

<!-- Display room details -->
<p><strong>Name:</strong> <?php echo $room_details['name']; ?></p>
<p><strong>Amenities:</strong> <?php echo $room_details['amenities']; ?></p>
<p><strong>Charge:</strong> <?php echo $room_details['charge']; ?></p>
<p><strong>Square Feet:</strong> <?php echo $room_details['square_feet']; ?></p>

<?php
        } else {
            // Room not found
            echo "<p>No room details found for room number: $room_number</p>";
        }
    } else {
        // Error in query execution
        echo "<p>Error: " . mysqli_error($connection) . "</p>";
    }
} else {
    // If room number is not provided, display a message
    echo "<p>No room details available.</p>";
}
?>
