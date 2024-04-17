<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .record {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .record p {
            margin: 5px 0;
        }

        .close-button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .close-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Maintenance Records</h1>
        <?php
// Include the database connection file
include 'db.php';

// Query to fetch all maintenance records
$sql = "SELECT * FROM maintenance_records";

// Execute the query
$result = mysqli_query($connection, $sql);

// Check if records exist
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='record'>";
        echo "<p><strong>Request ID:</strong> " . $row["request_id"] . "</p>";
        echo "<p><strong>Room Number:</strong> " . $row["room_number"] . "</p>";
        echo "<p><strong>Maintenance Issue:</strong> " . $row["maintenance_issue"] . "</p>";
        echo "<p><strong>Maintenance Status:</strong> " . $row["maintenance_status"] . "</p>";
        echo "<a href='close_request.php?request_id=" . $row["request_id"] . "' class='close-button'>Close Request</a>";
        echo "</div>";
    }
} else {
    echo "No maintenance records found.";
}

// Close the database connection
mysqli_close($connection);
?>

    </div>
</body>
</html>
