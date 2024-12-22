<?php
// Database connection configuration
$servername = "localhost"; // Change if your database is hosted elsewhere
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "user_management"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
?>
