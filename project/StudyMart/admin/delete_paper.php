<?php
include('../connection/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM question_papers WHERE id = :id";
    $stmt = $pdo->prepare($query);
    
    try {
        $stmt->execute([':id' => $id]);
        header("Location: manage_papers.php"); 
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
