<div class="popup-container" id="popup-container" style="display: none;">
    <div class="popup" id="login-popup" style="display: none;">
        <form method="post" action="login_register.php">
            <h2>
                <span>USER LOGIN</span>
                <button type="reset" class="close-btn" onclick="closePopup()">X</button>
            </h2>
            <input type="email" placeholder="E-mail Or Username" name="username_email" required>
            <input type="password" placeholder="Password.." name="password" required>
            <button type="submit" class="lg-btn" name="login">Login</button>
        </form>
</div>