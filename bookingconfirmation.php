<!-- room_details.php -->
<?php
// Include the database connection file
include 'db.php';

// Fetch room details based on room ID (assuming room ID is passed as a POST parameter)
if (isset($_POST['room_id'])) {
    // Sample room details, replace with your logic to fetch actual room details
    $room_id = $_POST['room_id'];
    $room_details = array(
        "name" => "Sample Room",
        "amenities" => array("Amenity 1", "Amenity 2", "Amenity 3"),
        "charge" => "$100 per night", // Sample charge, replace with actual charge
        "square_feet" => "300 sq.ft" // Sample square feet, replace with actual size
    );
?>

<!-- Display room details -->
<p><strong>Name:</strong> <?php echo $room_details['name']; ?></p>
<p><strong>Amenities:</strong> <?php echo implode(", ", $room_details['amenities']); ?></p>
<p><strong>Charge:</strong> <?php echo $room_details['charge']; ?></p>
<p><strong>Square Feet:</strong> <?php echo $room_details['square_feet']; ?></p>

<?php
} else {
    // If room ID is not provided, display a message
    echo "<p>No room details available.</p>";
}
?>
