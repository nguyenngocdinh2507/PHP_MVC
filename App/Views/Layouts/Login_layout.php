<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <button onclick="showLogin()">Login</button>
                <button onclick="showRegister()">Register</button>
            </div>

            <div id="login-form" class="form active">
                <h2>Login</h2>
                <form action="/kiem-tra-dang-nhap" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Login" name="login">
                </form>
            </div>

            <div id="register-form" class="form">
                <h2>Register</h2>
                <form action="/dang-ky" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" id="password" name="password" value="" placeholder="Password" required>
                    <span id="error" style="color: red; font-size : 12px" ></span>
                    <input type="password" id="confirmPassword" name="confirmPassword" value="" placeholder="Confirm Password" required>
                    <input type="submit" id="'register" value="Register" name="register" >
                </form>
            </div>
        </div>
    </div>

    <script>
        function showLogin() {
            document.getElementById('login-form').classList.add('active');
            document.getElementById('register-form').classList.remove('active');
        }

        function showRegister() {
            document.getElementById('login-form').classList.remove('active');
            document.getElementById('register-form').classList.add('active');
        }

        const $ = document.querySelector.bind(document);
        var password = $('#password');
        var passwordConfirm = $('#confirmPassword');
        var register = $('#register');
        var error = 'Not match';
        passwordConfirm.onkeyup = () => {
            $('#error').textContent = error
            if(password.value == passwordConfirm.value){
                $('#error').textContent = "";
            }
        }

    </script>
</body>
</html>
