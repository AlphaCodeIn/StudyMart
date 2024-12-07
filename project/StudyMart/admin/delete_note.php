<?php
include('../connection/connection.php');

if (isset($_GET['id'])) {
    $note_id = $_GET['id']; 
    $query = "DELETE FROM notes WHERE id = :note_id";

    try {
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT); // Bind the note ID
        $stmt->execute(); 

        header("Location: manage_notes.php?status=deleted");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
} else {
    echo "No note ID provided!"; 
}
?>