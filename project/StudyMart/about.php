
<?php
require('connection/connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="/project/StudyMart/css/index.css?v=1.0;">
    <link rel="stylesheet" href="css/header.css?v=1.0">
    <title>StudyMart</title>
</head>
<body>
<?php include 'includes/header.php'; ?>
<div class="content-part">
    <div class="about-heading container">
        <h1 class="lg-heading">About Us</h1>
    </div>
    <div class="about-content container">
        <p>Welcome to StudyMart – your ultimate destination for academic resources, notes, and question papers! Our platform is designed to help students excel by providing easy access to study materials and curated content from various subjects.</p>
    </div>
</div>
<div class="ul-list container">
    <div class="left">
      <ul>
          <li>Study Notes</li>
          <li>Past Question Papers</li>
          <li>Subject-wise Resources</li>
      </ul>
    </div>
    <div class="right">
        <ul>
            <li>Join Study Groups</li>
            <li>Interactive Learning</li>
            <li>Top Recommendations</li>
        </ul>
    </div>
</div>
<section class="about-developer container">
    <div class="developer-section">
        <div class="developer-image">
            <img src="img/developer-image.jpg" alt="Developer Image">
            <h1>Lucky Chauhan</h1>
        </div>
        <div class="developer-info">
            <h2>About the Developer</h2>
            <p>Hi, I’m <span class="highlight">Lucky Chauhan</span>, the developer behind StudyMart. This platform was built out of my passion for coding and my desire to help students by providing easy access to study materials. Working on this project has allowed me to grow as a developer while contributing to the academic community.</p>
            <p>I hope this website proves to be useful and helps you in your academic journey.</p>            
        </div>
    </div>
</section>
<div class="number container">
    <div class="num notes">
        <span>2000</span>
        <p>Notes</p>
    </div>
    <div class="num papers">
        <span>1000</span>
        <p>Question Papers</p>
    </div>
    <div class="num subjects">
        <span>250</span>
        <p>Subjects</p>
    </div>
    <div class="num users">
        <span>5000</span>
        <p>Active Users</p>
    </div>
</div>
<div class="cta-contact container">
     <div class="cta-right">
        <a href="contact.php" class="cta-button">Contact Us</a>
     </div>
     <div class="cta-left">
        <p class="text-black">Ready to improve your study experience? Reach out to us now!</p>
     </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>