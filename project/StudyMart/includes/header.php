<?php
if (!defined('absolutepath')) {
    define('absolutepath', '/project/StudyMart/');
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav id="nav-bar">
    <div>
        <h1 class="heading">StudyMart</h1>
    </div>
    <div class="nav-item">
        <ul>
            <li><a href="<?php echo absolutepath; ?>index.php">HOME</a></li>
            <li><a href="<?php echo absolutepath; ?>notesbazzar/notes.php">NOTES</a></li>
            <li><a href="<?php echo absolutepath; ?>question_paper/paper.php">QUESTION PAPERS</a></li>
            <li><a href="<?php echo absolutepath; ?>contact.php">CONTACT</a></li>
            <li><a href="<?php echo absolutepath; ?>about.php">ABOUT</a></li>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<a href="\project\StudyMart\upload.php" class="upload-btn bg-green-u">UPLOAD</a>';

            }
            ?>
        </ul>
    </div>
    <div>
    <div>
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '
        <div class="user-section">
            <span class="username">Welcome, ' . htmlspecialchars($_SESSION['username']) . '</span>
            <a href="/project/studymart/profile.php">
                <img class="profile" src="/project/studymart/img/profile40.jpg" alt="User">
            </a>
        </div>';
    } else {
        echo '<button class="login-btn bg-green" type="button" onclick="showPopup(\'login\')">LOGIN</button>';
        echo '<button class="register-btn bg-light-blue" type="button" onclick="showPopup(\'register\')">REGISTER</button>';
    }
    ?>
</div>

    </div>
</nav>
<!-- ################### login-register popup #############/ -->

<!-- ******************  login popup *************** -->
<div class="popup-container" id="popup-container" style="display: none;">
    <div class="popup" id="login-popup" style="display: none;">
        <form method="post" action="login_register.php">
            <h2>
                <span>USER LOGIN</span>
                <button type="reset" class="close-btn" onclick="closePopup()">X</button>
            </h2>
            <input type="text" placeholder="E-mail Or Username" name="username_email" required>
            <input type="password" placeholder="Password.." name="password" required>
            <button type="submit" class="lg-btn" name="login">Login</button>
        </form>
    </div>

<!-- ******************  register popup *************** -->
    <div class="popup" id="register-popup" style="display: none;">
        <form method="post" action="login_register.php">
            <h2>
                <span>USER REGISTER</span>
                <button type="reset" class="close-btn" onclick="closePopup()">X</button>
            </h2>   
            <input type="text" placeholder="Full Name" name="fullname" required>
            <input type="text" placeholder="Username" name="username" required>
            <input type="email" placeholder="E-mail" name="email" required>
            <input type="password" placeholder="Password.." name="password" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</div>

<script>
    // *****************  Logout and login button show logic in js ***************
    function showPopup(type) {
    document.getElementById('popup-container').style.display = 'flex';
    if (type === 'login') {
        document.getElementById('login-popup').style.display = 'block';
        document.getElementById('register-popup').style.display = 'none';
    } else if (type === 'register') {
        document.getElementById('login-popup').style.display = 'none';
        document.getElementById('register-popup').style.display = 'block';
    }
}

function closePopup() {
    document.getElementById('popup-container').style.display = 'none';
}

function showSubMenu() {
    document.getElementById('sub-menu').style.display = 'block';
}

function hideSubMenu() {
    document.getElementById('sub-menu').style.display = 'none';
}

</script>
