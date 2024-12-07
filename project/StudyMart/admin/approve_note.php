<?php
include('../connection/connection.php');

if (isset($_GET['id'])) {
    $noteId = $_GET['id'];

    $query = "UPDATE notes SET is_approved = 1 WHERE id = :noteId";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':noteId', $noteId, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: manage_notes.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
