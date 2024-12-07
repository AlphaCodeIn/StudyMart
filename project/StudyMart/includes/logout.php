<?php
session_start();
session_destroy();
header("Location: http://localhost/project/StudyMart/index.php"); 
exit;
?>
