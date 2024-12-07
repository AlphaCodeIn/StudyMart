<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/index.css?v=2.0"> 
    <link rel="stylesheet" href="css/header.css?v=2.0">
    <title>Contact Us</title>
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="container">
    <section class="contact-us">
        <div class="contact-form-container">
            <h2>Get in Touch</h2>
            <form action="send_contact_form.php" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email address">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required placeholder="Enter your message" rows="5"></textarea>
                </div>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>
</div>


<?php include('includes/footer.php'); ?>

</body>
</html>
