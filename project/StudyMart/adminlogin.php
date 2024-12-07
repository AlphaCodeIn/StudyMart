<?php
session_start();

include('connection/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM registered_user WHERE username = :username LIMIT 1"; // Check username
    $stmt = $pdo->prepare($query);
    $stmt->execute([':username' => $username]);

    if ($stmt->rowCount() > 0) {

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the password is correct
        if (password_verify($password, $user['password'])) {
            
            // Check if the role is admin
            if ($user['role'] === 'admin') {
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                header('Location: /project/StudyMart/admin/dashboard.php');
                exit();
            } else {
                // If role is not admin, show an error
                $error = "You are not authorized to access this page.";
            }
        } else {
            $error = "Invalid password.";
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #f0f8ff, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 0;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        form label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #dcdcdc;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .login {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }
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
