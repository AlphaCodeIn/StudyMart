<?php 
session_start();
require('connection/connection.php');

if (isset($_SESSION['alert'])) {
    echo "<script>alert('{$_SESSION['alert']}');</script>";
    unset($_SESSION['alert']); 
}
if (isset($_SESSION['login_error'])) {
    echo "<script>alert('{$_SESSION['login_error']}');</script>";
    unset($_SESSION['login_error']); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="/project/studymart/img/favicon96.jpg">
    <link rel="stylesheet" href="css/index.css?v=1.0">
    <link rel="stylesheet" href="css/header.css?v=1.0">
    <link rel="stylesheet" href="css/index-bgimage.css">
    <title>StudyMart</title>
</head>
<body>
<?php include 'includes/header.php'; ?>

<section class="img-slider">
    <div class="text-overlay">

    </div>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
