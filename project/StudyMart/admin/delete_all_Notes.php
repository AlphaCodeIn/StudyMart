<?php
include('../connection/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $query = "DELETE FROM notes";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        header("Location: manage_papers.php?status=deleted");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
