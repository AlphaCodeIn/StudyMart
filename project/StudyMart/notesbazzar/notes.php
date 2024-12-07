<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/connection/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/includes/auth.php';

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM notes WHERE (title LIKE :search OR description LIKE :search OR author LIKE :search) AND is_approved = 1";
$stmt = $pdo->prepare($sql);
$searchTerm = '%' . $searchQuery . '%';
$stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
$stmt->execute();
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/StudyMart/css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/project/StudyMart/css/header.css?v=<?php echo time(); ?>">   
    <!-- <link rel="stylesheet" href="/project/StudyMart/css/notes-paper.css?v="> -->
    <title>StudyMart - Notes</title>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/includes/header.php';
?>

<form class="search-section" method="GET" action="notes.php">
    <input type="text" name="search" placeholder="Search notes..." 
        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Search</button>
</form>

<div class="notes-section">
    <div class="notes-container">
        <?php
        if ($notes && count($notes) > 0) {
            foreach ($notes as $note) {
                $thumbnailPath = $note['thumbnail_path'] ? $note['thumbnail_path'] : '/project/StudyMart/uploads/thumbnails/default-thumbnail.png';
                $noteTitle = strlen($note['title']) > 10 ? substr($note['title'], 0, 10) . '...' : $note['title'];
                $relativeFilePath = '/project/StudyMart/uploads/notes/' . $note['file_name'];
                ?>
                <div class="note-card" data-note-id="<?php echo $note['id']; ?>">
                    <div class="note-thumbnail" style="background-image: url('<?php echo $thumbnailPath; ?>');"></div>
                    <h2 class="note-title"><?php echo $noteTitle; ?></h2>
                    <div class="button-container">
                        <a href="<?php echo $relativeFilePath; ?>" class="note-download" download>Download</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<p>No notes found matching your search.</p>';
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<script>
    document.querySelectorAll('.note-card').forEach(function(card) {
        card.addEventListener('click', function() {
            var noteId = card.getAttribute('data-note-id');
            window.location.href = '/project/StudyMart/notesbazzar/note-details.php?note_id=' + noteId;
        });
    });
    document.querySelectorAll('.note-download').forEach(function(downloadLink) {
        downloadLink.addEventListener('click', function(event) {
            event.stopPropagation(); 
        });
    });
</script>

</body>
</html>
