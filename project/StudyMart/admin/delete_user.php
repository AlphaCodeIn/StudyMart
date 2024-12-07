<?php
include('../connection/connection.php');

// Check if an ID is provided
if (isset($_GET['id'])) {
    $userId = $_GET['id']; 

    try {
        // First, delete notes associated with the user
        $deleteNotesQuery = "DELETE FROM notes WHERE user_id = :user_id";
        $deleteNotesStmt = $pdo->prepare($deleteNotesQuery);
        $deleteNotesStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $deleteNotesStmt->execute();

        // Then, delete the user from the registered_user table
        $deleteUserQuery = "DELETE FROM registered_user WHERE id = :user_id";
        $deleteUserStmt = $pdo->prepare($deleteUserQuery);
        $deleteUserStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

        // Execute the delete query for the user
        if ($deleteUserStmt->execute()) {
            echo "User and associated notes deleted successfully.";
        } else {
            echo "Error: Unable to delete the user.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "User ID is required.";
}
?>
