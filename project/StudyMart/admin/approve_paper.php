<?php
include('../connection/connection.php');

if (isset($_GET['id'])) {
    $note_id = $_GET['id']; 

    $query = "UPDATE question_papers SET is_approved = 1 WHERE id = :id";
    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $note_id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: manage_papers.php?status=approved");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No ID provided.";
}
?>