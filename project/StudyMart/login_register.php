<?php

require('connection/connection.php'); 
session_start();

// Registration Logic
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security

    // Using $pdo here
    $stmt = $pdo->prepare("SELECT * FROM registered_user WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if ($result['username'] === $username) {
            $_SESSION['register_error'] = 'Username already exists.';
            header("Location: index.php"); 
            exit;
        }
        if ($result['email'] === $email) {
            $_SESSION['register_error'] = 'Email already exists.';
            header("Location: index.php");
            exit;
        }
    } else {
        $stmt = $pdo->prepare("INSERT INTO registered_user (full_name, username, email, password) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$fullname, $username, $email, $password])) {
            $_SESSION['register_success'] = 'Registration successful! Redirecting to login page...';
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['register_error'] = 'Error: ' . $pdo->errorInfo()[2];
            header("Location: index.php");
            exit;
        }
    }
}

// Login Logic
if (isset($_POST['login'])) {
    $username_email = $_POST['username_email'];
    $password = $_POST['password'];

    // Using $pdo here
    $stmt = $pdo->prepare("SELECT * FROM registered_user WHERE username = ? OR email = ?");
    $stmt->execute([$username_email, $username_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Store the user ID in the session for later use
        $_SESSION['user_id'] = $user['id']; // Store user ID
        $_SESSION['username'] = $user['username']; // Store username
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['login_error'] = 'You have entered wrong credentials.';
        header("Location: index.php"); 
        exit;
    }
}
?>
