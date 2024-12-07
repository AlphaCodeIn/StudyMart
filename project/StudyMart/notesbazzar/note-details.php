<?php
session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/connection/connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /project/StudyMart/index.php");
    exit();
}

if (!isset($_GET['note_id'])) {
    header("Location: /project/StudyMart/notesbazzar/notes.php");
    exit();
}

$note_id = $_GET['note_id'];
$sql = "SELECT id, title, author, description, subject, file_name, thumbnail_path, DATE(upload_at) AS upload_date FROM notes WHERE id = :note_id AND is_approved = 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':note_id', $note_id, PDO::PARAM_INT);
$stmt->execute();
$note = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$note) {
    echo "<script>
            window.history.back();
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/StudyMart/css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/project/StudyMart/css/header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/project/StudyMart/css/paper-details.css?v=<?php echo time(); ?>">
    <style>
 * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: sans-serif;
}

/* Body Styling */
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: #f5f5f5;
}

/* Paper Details Container */
.paper-details-container {
    display: flex;
    margin: 20px auto;
    width: 90%;
    max-width: 1200px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

/* Left Side (Image) */
.paper-left-side {
    flex: 1;
    padding-right: 20px;
}

.paper-thumbnail {
    width: 71%;
    height: 300px;
    background-size: cover;
    background-position: center;
    border-radius: 8px;
    object-fit: cover;
}

/* Right Side (Details) */
.paper-right-side {
    flex: 2;
    padding-left: 20px;
}

/* Title Styling */
.paper-title {
    font-size: 2em;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

/* Subject Styling */
.paper-subject,
.paper-university-college,
.paper-year {
    font-size: 1.1em;
    color: #555;
    margin-bottom: 10px;
}

/* Description Styling */
.paper-description {
    font-size: 1em;
    color: #444;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Download Button Styling */
.download-btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 1.1em;
}

.download-btn:hover {
    background-color: #0056b3;
}

/* Container Styling */
.container {
    flex-grow: 1;
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
}

/* Footer Styling */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: auto;
    font-size: 0.9rem;
}
.ht-headeing{
    text-align: center;
    padding: 30px;
}
    </style>
    <title>StudyMart - Paper Details</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/includes/header.php'; ?>
<div class="center">
    <h1 class="ht-headeing">Note Details</h1>
    <div class="paper-details-container">
        <div class="paper-left-side">
            <!-- Thumbnail (Image) -->
            <div class="paper-thumbnail" style="background-image: url('<?php echo htmlspecialchars($paper['thumbnail_path'] ?? '/project/StudyMart/uploads/thumbnails/default-thumbnail.png'); ?>');"></div>
        </div>
        
        <div class="paper-right-side">
            <h1 class="paper-title"><?php echo htmlspecialchars($note['title']); ?></h1>
            <p class="paper-subject"><strong>Subject:</strong> <?php echo htmlspecialchars($note['subject']); ?></p>
            <p class="paper-university-college"><strong>Author:</strong> <?php echo htmlspecialchars($note['author']); ?></p>
            <p class="paper-description"><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($note['description'])); ?></p>
            <a class="download-btn"  href="/project/StudyMart/uploads/notes/<?php echo htmlspecialchars($note['file_name']); ?>" download>Download Note</a>
        </div>
    </div>
</div>


<?php include '../includes/footer.php'; ?>

</body>
</html>
