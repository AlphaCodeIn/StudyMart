<?php
include('../connection/connection.php');
include('../includes/sidebar.php'); // Include the sidebar

// Query to fetch all users from the registered_user table
$query = "SELECT * FROM registered_user";

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

    <!-- Sidebar -->
    <!-- Sidebar is included from the sidebar.php file -->

    <!-- Main Content -->
    <div class="content">
        <div class="dashboard-header">
            <h1>Manage Users</h1>
        </div>

        <?php if ($stmt->rowCount() > 0): ?>
            <div class="card">
                <h3>Users List</h3>
                <table>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>

                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td>
                            <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="delete-alpha">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>

    </div>

            
</body>
</html>
