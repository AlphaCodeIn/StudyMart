<!-- ######################## POPUP CONTAINER ######################################################## -->

<!-- ********************** Login Popup *********************************** -->
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

    <!-- ************************ Register Popup **************************** -->
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

<!-- JavaScript for handling popups -->
<script>
    // Function to show the appropriate popup (login or register)
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

    // Function to close the popup
    function closePopup() {
        document.getElementById('popup-container').style.display = 'none';
    }
</script>