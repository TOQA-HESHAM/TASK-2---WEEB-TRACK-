<?php
// Include database connection
include 'db.php';

// Get all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toggle App</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            color: #444;
            text-align: center;
        }

        form#userForm {
            margin-bottom: 20px;
            text-align: center;
        }

        form#userForm input {
            padding: 8px;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        form#userForm button {
            padding: 8px 16px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        form#userForm button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .toggleBtn {
            padding: 6px 12px;
            background-color: #ffc107;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .toggleBtn:hover {
            background-color: #e0a800;
        }
    </style>

    <script src="script.js" defer></script>
</head>
<body>

    <h1>Users Data</h1>

    <!-- Form to add a new user -->
    <form id="userForm" method="POST" action="insert.php">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="number" name="age" placeholder="Enter Age" required>
        <button type="submit">Add User</button>
    </form>

    <!-- Table to display users -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Status</th>
            <th>Toggle</th>
        </tr>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ID']) ?></td>
                    <td><?= htmlspecialchars($row['Name']) ?></td>
                    <td><?= htmlspecialchars($row['Age']) ?></td>
                    <td><?= htmlspecialchars($row['Status']) ?></td>
                    <td>
                        <button class="toggleBtn" data-id="<?= $row['ID'] ?>">
                            Toggle
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No users found</td></tr>
        <?php endif; ?>
    </table>

</body>
</html>
