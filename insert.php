<?php
// Include database connection
include 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Default status = 0
    $status = 0;

    // Insert into database
    $sql = "INSERT INTO users (name, age, status) VALUES ('$name', '$age', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to index.php
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
