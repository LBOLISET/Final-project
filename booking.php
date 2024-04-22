<?php
include 'db.php';

// Function to fetch available rooms based on room type
function fetchAvailableRooms($conn, $roomType) {
    // Query to select available rooms of the specified type
    $query = "SELECT * FROM Rooms WHERE RoomType = ? AND Availability = 'available'";
    
    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $roomType);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);
    
    // Check if query was successful
    if($result) {
        // Fetch all rows as an associative array
        $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // Return the array of rooms
        return $rooms;
    } else {
        // Return an empty array if query failed
        return [];
    }
}

// Check if the room type is selected
if(isset($_POST['room-type']) && !empty($_POST['room-type'])) {
    // Get the selected room type
    $selectedRoomType = $_POST['room-type'];
    // Fetch available rooms of the selected type
    $availableRooms = fetchAvailableRooms($conn, $selectedRoomType);
}
?>

<!-- Display available rooms -->
<?php if(isset($availableRooms) && !empty($availableRooms)): ?>
    <h2>Available Rooms</h2>
    <table>
        <thead>
            <tr>
                <th>Room Number</th>
                <th>Room Size</th>
                <th>Price</th>
                <th>Available From</th>
                <th>Available To</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($availableRooms as $room): ?>
                <tr>
                    <td><?php echo $room['RoomNumber']; ?></td>
                    <td><?php echo $room['RoomSize']; ?> sq.ft</td>
                    <td><?php echo $room['Price']; ?>$ per night</td>
                    <td><?php echo $room['AvailableFrom']; ?></td>
                    <td><?php echo $room['AvailableTo']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No rooms available for the selected room type.</p>
<?php endif; ?>
