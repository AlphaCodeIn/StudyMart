<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/connection/connection.php');
require $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/includes/auth.php';

$error_message = "";
$success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // storing data from from of html
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $university_college = isset($_POST['university_college']) ? $_POST['university_college'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $user_id = $_SESSION['user_id'];
    
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/uploads/question_papers/';
    $thumbnailDir = $_SERVER['DOCUMENT_ROOT'] . '/project/StudyMart/uploads/thumbnails/';
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx" && $_FILES["file"]["name"] !== '') {
        $error_message = "Sorry, only PDF and DOC files are allowed for the question paper.";
        $uploadOk = 0;
    }

    if ($_FILES["file"]["size"] > 10 * 1024 * 1024) {
        $error_message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    $randomName = bin2hex(random_bytes(16));
    $uniqueFileName = $randomName . '.' . $fileType;

    if ($uploadOk == 1 && !empty($_FILES["file"]["name"])) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $uniqueFileName)) {
            $thumbnailPath = '/project/StudyMart/uploads/thumbnails/default-thumbnail.png';

            if (!empty($_FILES["thumbnail"]["name"])) {
                $thumbnailType = strtolower(pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION));
                if ($thumbnailType == "jpg" || $thumbnailType == "jpeg" || $thumbnailType == "png") {
                    $uniqueThumbnailName = $randomName . '.' . $thumbnailType;
                    $thumbnailFile = $thumbnailDir . $uniqueThumbnailName;

                    if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbnailFile)) {
                        $thumbnailPath = '/project/StudyMart/uploads/thumbnails/' . $uniqueThumbnailName;
                    } else {
                        $error_message = "Error uploading the thumbnail.";
                    }
                } else {
                    $error_message = "Sorry, only JPG, JPEG, and PNG files are allowed for the thumbnail.";
                }
            }

            $is_approved = 1;

            try {
                $sql = "INSERT INTO question_papers (file_name, title, year, subject, university_college, description, user_id, thumbnail_path, upload_at)
                        VALUES (:file_name, :title, :year, :subject, :university_college, :description, :user_id, :thumbnail_path, NOW())";
                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':file_name', $uniqueFileName, PDO::PARAM_STR);
                $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                $stmt->bindParam(':year', $year, PDO::PARAM_STR);
                $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
                $stmt->bindParam(':university_college', $university_college, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':thumbnail_path', $thumbnailPath, PDO::PARAM_STR);
                $stmt->bindParam(':is_approved', $is_approved, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    $success_message = "Question paper uploaded successfully.";
                } else {
                    $error_message = "Error: Could not upload question paper.";
                }
            } catch (PDOException $e) {
                $error_message = "Error: " . $e->getMessage();
            }
        } else {
            $error_message = "Sorry, there was an error uploading your question paper file.";
        }
    } else {
        $error_message = "Please select a valid file to upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Question Paper</title>
    <link rel="stylesheet" href="/project/StudyMart/css/index.css?v=1.0">
    <link rel="stylesheet" href="/project/StudyMart/css/header.css?v=1.0">
     <link rel="stylesheet" href="/project/StudyMart/css/upload-section.css?v=1.0">

</head>
<body>

 <header>
        <div class="container">
            <div class="logo">
                <h1>Admin Panel</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Upload Question Paper</h1>

        <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php elseif (!empty($success_message)) : ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>

       <form action="" method="post" enctype="multipart/form-data" class="form-layout">
            <div class="upload-section">
                <label for="file">Select File (PDF, DOC, DOCX):</label>
                <div class="drag-drop-zone" id="file-drop-zone">
                    <p>Drag and drop a file here or click to select</p>
                    <input type="file" name="file" id="file" style="display:none;" accept=".pdf, .doc, .docx" />
                </div>
                <label for="thumbnail">Upload Thumbnail (JPG, PNG, JPEG):</label>
                <div class="drag-drop-zone" id="thumbnail-drop-zone">
                    <p>Drag and drop a thumbnail here or click to select</p>
                    <input type="file" name="thumbnail" id="thumbnail" style="display:none;" accept=".jpg, .jpeg, .png" />
                </div>
            </div>

            <div class="details-section">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="Exam Paper" required>
                <label for="description">Description:</label>
                <textarea name="description" id="description" placeholder="The paper Of Dcrust Final Exam.." required></textarea>
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject" placeholder="Python" required>
                <label for="university_college">University/College:</label>
                <input type="text" name="university_college" id="university_college" placeholder="DCRUST"required>
                <label for="year">Year:</label>
                <input type="text" name="year" id="year" placeholder="2024" required>
                <button type="submit">Upload</button>
            </div>
        </form>
    </div>

    <script>
const fileDropZone = document.getElementById('file-drop-zone');
const fileInput = document.getElementById('file');
const thumbnailDropZone = document.getElementById('thumbnail-drop-zone');
const thumbnailInput = document.getElementById('thumbnail');

fileDropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    fileDropZone.classList.add('drag-over');
});

fileDropZone.addEventListener('dragleave', () => {
    fileDropZone.classList.remove('drag-over');
});

fileDropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    fileDropZone.classList.remove('drag-over');
    fileInput.files = e.dataTransfer.files;
    if (fileInput.files.length > 0) {
        fileDropZone.querySelector('p').textContent = `Selected File: ${fileInput.files[0].name}`;
    }
});

fileDropZone.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
        fileDropZone.querySelector('p').textContent = `Selected File: ${fileInput.files[0].name}`;
    } else {
        fileDropZone.querySelector('p').textContent = 'Drag and drp a file here or click to select';
    }
});

thumbnailDropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    thumbnailDropZone.classList.add('drag-over');
});

thumbnailDropZone.addEventListener('dragleave', () => {
    thumbnailDropZone.classList.remove('drag-over');
});

thumbnailDropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    thumbnailDropZone.classList.remove('drag-over');
    thumbnailInput.files = e.dataTransfer.files;
    if (thumbnailInput.files.length > 0) {
        thumbnailDropZone.querySelector('p').textContent = `Selected Thumbnail: ${thumbnailInput.files[0].name}`;
    }
});

thumbnailDropZone.addEventListener('click', () => {
    thumbnailInput.click();
});

thumbnailInput.addEventListener('change', () => {
    if (thumbnailInput.files.length > 0) {
        thumbnailDropZone.querySelector('p').textContent = `Selected Thumbnail: ${thumbnailInput.files[0].name}`;
    } else {
        thumbnailDropZone.querySelector('p').textContent = 'Drag and drop a thumbnail here or click to select';
    }
});

    </script>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
