<?php
include('../connection/connection.php'); 

$password = 'alpha@123456'; 
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$username = 'admin'; 
$query = "INSERT INTO admins (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($query);
$stmt->execute([
    ':username' => $username,
    ':password' => $hashedPassword
]);

echo "Admin user inserted successfully!";
?>
