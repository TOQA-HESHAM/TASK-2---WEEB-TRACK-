<?php
include 'db.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // اختبار وصول القيمة
    file_put_contents('log.txt', "Received ID: $id\n", FILE_APPEND);

    // Get current status
    $sql = "SELECT Status FROM users WHERE ID = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $newStatus = ($row['Status'] == 1) ? 0 : 1;

        // Update status
        $updateSql = "UPDATE users SET Status = $newStatus WHERE ID = $id";
        if ($conn->query($updateSql) === TRUE) {
            echo "success";
        } else {
            echo "SQL Error: " . $conn->error;
        }
    } else {
        echo "No record found for ID $id";
    }
} else {
    echo "No ID received";
}
$conn->close();
?>
