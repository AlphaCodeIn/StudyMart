<?php
include('auth_admin.php');
include('../includes/sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
   
    <!-- Main Content -->
    <div class="content">
        <h1>Admin Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['admin_username']; ?>!</p>

        <ul>
            <li><a href="approved_notes.php">Approved Notes</a></li>
            <li><a href="approved       _papers.php">Approved Question Papers</a></li>
            <li><a href="manage_notes.php">Manage Notes</a></li>
            <li><a href="manage_papers.php">Manage Question Papers</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

</body>
</html>
