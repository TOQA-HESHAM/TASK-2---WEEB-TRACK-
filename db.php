<?php
// Database connection information
$servername = "localhost"; // Local server
$username = "root"; // Default username in XAMPP
$password = ""; // Default password (empty)
$dbname = "users_db"; // The database name we created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// If you want to test the connection, uncomment the next line
// echo "Connection successful";
?>
