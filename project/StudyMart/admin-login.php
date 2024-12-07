<?php
session_start();
include('connection/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to get the user data
    $query = "SELECT * FROM registered_user WHERE username = :username LIMIT 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':username' => $username]);

    // Check if the username exists
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the role is admin
        if ($user['role'] == 'admin') {

            // Verify the entered password with the stored hashed password
            if (password_verify($password, $user['password'])) {
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                header('Location: /project/StudyMart/admin/dashboard.php');
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "You are not an admin.";
        }
    } else {
        $error = "Admin not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Add your styles here */
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Admin Login</h2>

        <?php if (isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <button type="submit" class="login">Login</button>
        </form>
    </div>
</div>

</body>
</html>
s