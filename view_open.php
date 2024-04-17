<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Open Maintenance Requests</title>
</head>
<body>
    <h2>Open Maintenance Requests</h2>
    <?php
    // Include the database connection file
    include 'db.php';

    // SQL query to select open maintenance requests
    $sql = "SELECT * FROM maintenance WHERE maintenance_status = 'open'";
    $result = mysqli_query($conn, $sql);

    // Display open maintenance requests
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<p><strong>Request ID:</strong> " . $row['request_id'] . "</p>";
            echo "<p><strong>Room Number:</strong> " . $row['room_number'] . "</p>";
            echo "<p><strong>Maintenance Issue:</strong> " . $row['maintenance_issue'] . "</p>";
            echo "<form action='close_request.php' method='POST'>";
            echo "<input type='hidden' name='request_id' value='" . $row['request_id'] . "'>";
            echo "<input type='submit' name='close' value='Close'>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No open maintenance requests found.</p>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
