<?php
$server = "localhost";
$username = "lboliset";
$password = "thirsted kazan bedeck endeavor";
$database = "lboliset_db";


// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
	
}

?>