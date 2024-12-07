<?php
$host = 'localhost';
$dbname = 'studymart';
$username = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    error_log('Connection failed: ' . $e->getMessage(), 3, 'error_log.txt');
    echo 'Database connection failed. Please try again later.';
}
?>
