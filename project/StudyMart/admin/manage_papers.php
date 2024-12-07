<?php
include('../connection/connection.php');
include('../includes/sidebar.php'); // Include the sidebar

// Modify the query to extract the year from the upload_at field
$query = "SELECT question_papers.*, registered_user.username, YEAR(question_papers.upload_at) AS year
          FROM question_papers
          JOIN registered_user ON question_papers.user_id = registered_user.id";

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Function to truncate text if it exceeds 20 characters
function truncateText($text, $length = 20) {
    return strlen($text) > $length ? substr($text, 0, $length) . '...' : $text;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Papers - Admin Dashboard</title>
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
            <h1>Manage Papers</h1>
        </div>

        <?php if ($stmt->rowCount() > 0): ?>
            <div class="card">
                <h3>Question Papers List</h3>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>University/College</th>
                        <th>Uploaded By</th>
                        <th>Year</th> <!-- New Year Column -->
                        <th>Approval</th>
                        <th>Action Status</th>
                    </tr>

                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <!-- Title -->
                            <td><?php echo htmlspecialchars(truncateText($row['title'])); ?></td>

                            <!-- Subject -->
                            <td><?php echo htmlspecialchars(truncateText($row['subject'])); ?></td>

                            <!-- University/College -->
                            <td><?php echo htmlspecialchars(truncateText($row['university_college'])); ?></td>

                            <!-- Uploaded By -->
                            <td><?php echo htmlspecialchars(truncateText($row['username'])); ?></td>

                            <!-- Year -->
                            <td><?php echo htmlspecialchars($row['year']); ?></td> <!-- Displaying the year -->

                            <!-- Approval -->
                            <td>
                                <?php if ($row['is_approved'] == 0): ?>
                                    <span class="approved">Approved</span>
                                <?php else: ?>
                                    <span class="unapproved">Not Approved</span>
                                <?php endif; ?>
                            </td>

                            <!-- Action Status -->
                            <td>
                                <?php if ($row['is_approved'] == 0): ?>
                                    <a href="approve_paper.php?id=<?php echo $row['id'];?>">Approve</a> | 
                                <?php endif; ?>
                                <a href="delete_paper.php?id=<?php echo $row['id']; ?>"
                                class="delete-alpha"
                                onclick="return confirm('Are you sure you want to delete this note?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        <?php else: ?>
            <p>No question papers found.</p>
        <?php endif; ?>
    <div class="center-button">
            <a href="upload_paper.php" class="upload-button">Upload Question Paper</a>
    <form method="post" action="delete_all_papers.php" onsubmit="return confirm('Are you sure you want to delete all question papers?');">
        <button type="submit" class="upload-button" style="background-color: #f44336; cursor: pointer;">Delete All Papers</button>
    </form>
    </div>
   


    </div>
</body>
</html>
