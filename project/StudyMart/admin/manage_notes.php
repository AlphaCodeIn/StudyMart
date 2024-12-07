<?php
include('../connection/connection.php');
include('../includes/sidebar.php'); 
$query = "SELECT notes.*, registered_user.username
          FROM notes
          JOIN registered_user ON notes.user_id = registered_user.id";

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
    <title>Manage Notes - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <style>
         .center-button {
            text-align: center;
            margin-top: 50px; 
        }
        .center-button form{
            display: inline-block;

        }
        .upload-button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div class="content">
        <div class="dashboard-header">
            <h1>Manage Notes</h1>
        </div>

        <?php if ($stmt->rowCount() > 0): ?>
            <div class="card">
                <h3>Notes List</h3>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Uploaded By</th>
                        <th>Approval Status</th>
                        <th>Action</th>
                    </tr>

                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['author']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td>
                                <?php if ($row['is_approved'] == 1): ?>
                                    <span class="approved">Approved</span>
                                <?php else: ?>
                                    <span class="unapproved">Not Approved</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($row['is_approved'] == 0): ?>
                                    <a href="approve_note.php?id=<?php echo $row['id']; ?>">Approve</a> | 
                                <?php endif; ?>
                                <a href="delete_note.php?id=<?php echo $row['id']; ?>" 
                                   onclick="return confirm('Are you sure you want to delete this note?');" class="delete-alpha">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        <?php else: ?>
            <p>No notes found.</p>
        <?php endif; ?>

    <div class="center-button">
            <a href="upload_notes.php" class="upload-button">Upload Note</a>
    <form method="post" action="delete_all_Notes.php" onsubmit="return confirm('Are you sure you want to delete all Notes?');">
        <button type="submit" class="upload-button" style="background-color: #f44336; cursor: pointer;">Delete All Papers</button>
    </form>
    </div>
   

    </div>

</body>
</html>
