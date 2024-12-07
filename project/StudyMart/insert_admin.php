<?php
session_start(); // Start the session at the very top

// Include the connection to the database
include('connection/connection.php');

// Check if the session is set (i.e., the user is logged in)
if (isset($_SESSION['admin_id'])) {
    // Get the admin ID from the session
    $admin_id = $_SESSION['admin_id']; 

    // Assuming you're getting the new password from a form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_password = $_POST['admin'];
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update the password in the database
        $query = "UPDATE registered_user SET password = :password WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':password' => $hashed_password,
            ':id' => $admin_id
        ]);

        // Check if the password was successfully updated
        if ($stmt->rowCount() > 0) {
            echo "Password updated successfully.";
        } else {
            echo "Failed to update password.";
        }
    }
} else {
    echo "You must be logged in to update the password.";
}
?>
