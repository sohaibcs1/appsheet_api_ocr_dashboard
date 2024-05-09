<?php
// Define database connection parameters
$servername = "test.golfinred.com";
$username = "golfinred-test";
$password = "17uWfGhVcr41rL44IYn0";
$dbname = "golfinred-test";



// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check for connection errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from request
$data = json_decode(file_get_contents('php://input'), true);

// Insert data into table
$sql = "INSERT INTO dataValues(value1, value2, value3) VALUES ('".$data['value1']."', '".$data['value2']."', '".$data['value3']."')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
