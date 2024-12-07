<?php
include('../connection/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the is_approved status to 1 (approved)
    $query = "UPDATE question_papers SET is_approved = 1 WHERE id = :id";
    $stmt = $pdo->prepare($query);
    
    try {
        $stmt->execute([':id' => $id]);
        header("Location: manage_papers.php"); // Redirect back to the manage papers page
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
