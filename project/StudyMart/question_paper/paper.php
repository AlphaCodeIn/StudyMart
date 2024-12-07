<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/connection/connection.php';
require $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/includes/auth.php';

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM question_papers WHERE (title LIKE :search OR description LIKE :search OR subject LIKE :search) AND is_approved = 1";
$stmt = $pdo->prepare($sql);
$searchTerm = '%' . $searchQuery . '%';
$stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
$stmt->execute();
$papers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/StudyMart/css/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/project/StudyMart/css/header.css?v=<?php echo time(); ?>">   
    <!-- <link rel="stylesheet" href="/project/StudyMart/css/notes-paper.css?v="> -->
    <title>StudyMart - Question Papers</title>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/includes/header.php';
?>

<form class="search-section" method="GET" action="paper.php">
    <input type="text" name="search" placeholder="Search question papers..." 
        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <button type="submit">Search</button>
</form>

<div class="paper-section">
    <div class="papers-container">
        <?php
        if ($papers && count($papers) > 0) {
            foreach ($papers as $paper) {
                $thumbnailPath = $paper['thumbnail_path'] ? $paper['thumbnail_path'] : '/project/StudyMart/uploads/thumbnails/default-thumbnail.png';
                $paperTitle = strlen($paper['title']) > 10 ? substr($paper['title'], 0, 10) . '...' : $paper['title'];
                $relativeFilePath = '/project/StudyMart/uploads/question_papers/' . $paper['file_name'];
                ?>
                <div class="paper-card" data-paper-id="<?php echo $paper['id']; ?>">
                    <div class="paper-thumbnail" style="background-image: url('<?php echo $thumbnailPath; ?>');"></div>
                    <h2 class="paper-title"><?php echo $paperTitle; ?></h2>
                    <div class="button-container">
                        <a href="<?php echo $relativeFilePath; ?>" class="paper-download" download>Download</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<p>No question papers found matching your search.</p>';
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<script>
    // Handle click on paper card to navigate to paper details page
    document.querySelectorAll('.paper-card').forEach(function(card) {
        card.addEventListener('click', function() {
            var paperId = card.getAttribute('data-paper-id');
            window.location.href = '/project/StudyMart/question_paper/paper-details.php?paper_id=' + paperId;
        });
    });

    // Prevent download link click from triggering the card click event
    document.querySelectorAll('.paper-download').forEach(function(downloadLink) {
        downloadLink.addEventListener('click', function(event) {
            event.stopPropagation(); 
        });
    });
</script>

</body>
</html>
