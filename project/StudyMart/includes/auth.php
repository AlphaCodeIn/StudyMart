<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: /project/StudyMart/index.php");
    echo "<script>window.onload = function() { showPopup('login'); }</script>";
}
?>
