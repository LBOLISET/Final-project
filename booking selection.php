<?php
// Include your database connection file
include 'db.php';

// Retrieve form data
$roomType = $_POST['RoomType'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$adults = $_POST['adults'];
$children = $_POST['children'];

// Construct SQL query
$query = "SELECT * FROM Rooms WHERE RoomType = '$roomType'";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if query was successful
if ($result) {
    // Display the results in a table
    echo "<table>";
    echo "<tr><th>RoomID</th><th>RoomNumber</th><th>RoomType</th><th>RoomSize (sq.ft)</th><th>Occupancy</th><th>BedConfiguration</th><th>ViewType</th><th>Amenities</th><th>Price</th><th>Availability</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['RoomID']."</td>";
        echo "<td>".$row['RoomNumber']."</td>";
        echo "<td>".$row['RoomType']."</td>";
        echo "<td>".$row['RoomSize']."</td>";
        echo "<td>".$row['Occupancy']."</td>";
        echo "<td>".$row['BedConfiguration']."</td>";
        echo "<td>".$row['ViewType']."</td>";
        echo "<td>".$row['Amenities']."</td>";
        echo "<td>".$row['Price']."</td>";
        echo "<td>";
        if ($row['Availability'] == 'available') {
            echo "<form action='booking confirmation.html' method='post'>";
            echo "<input type='hidden' name='room_id' value='".$row['RoomID']."'>";
            echo "<button type='submit'>Available</button>";
            echo "</form>";
        } else {
            echo "<button disabled>Not Available</button>";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close database connection
mysqli_close($connection);
?>
