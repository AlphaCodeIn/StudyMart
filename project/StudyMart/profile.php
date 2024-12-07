<?php
include 'connection/connection.php'; 
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "SELECT email, username FROM registered_user WHERE id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "User not found for ID: " . $user_id;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <img src="/project/studymart/img/profile40.jpg" alt="User" class="profile-pic">
        </div>
        
        <div class="profile-details">
            <h3>Profile Details</h3>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        </div>

        <div class="profile-actions">
        <a onclick="window.history.back();" class="btn logout" style="background-color: dodgerblue;">Back</a>
            <a href="includes/logout.php" class="btn logout">Logout</a>

        </div>
        
    </div>
</body>
</html>
