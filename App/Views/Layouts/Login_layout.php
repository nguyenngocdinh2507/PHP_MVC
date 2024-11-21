<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/Public/Assets/Clients/CSS/Login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <form method="POST">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span id="error" style="color: red; font-size : 12px" ></span>
                    <input type="submit" value="Login" name="login">
                </form>
            </div>

            <div id="register-form" class="form">
                <h2>Register</h2>
                <form action="/dang-ky" method="POST">
                    <input type="text" name="username" id="username_r" placeholder="Username" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" id="password_r" name="password" value="" placeholder="Password" required>
                    <span id="error" style="color: red; font-size : 12px" ></span>
                    <input type="password" id="confirmPassword_r" name="confirmPassword" value="" placeholder="Confirm Password" required>
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


        //Jquery
        // console.log($);

        // Ajax login
        $(document).ready(function () {
            $('#login-form').on('submit', function (e) {
                e.preventDefault();
                const username = $('#username').val();
                const password = $('#password').val();
                $.ajax({
                    url: '/kiem-tra-dang-nhap', // Gửi yêu cầu đến file PHP xử lý
                    type: 'POST',
                    data: { username: username, password: password },
                    success: function (response) {
                        // console.log(response);
                        if (response == '/trang-chu') {
                            // Nếu đăng nhập thành công
                            window.location.href = '/trang-chu';
                        } else if (response === '/trang-quan-li-admin') {
                            // Nếu đăng nhập thành công
                            window.location.href = '/trang-quan-li-admin';
                        }else{
                            // Nếu đăng nhập thất bại
                            $('#error').text(response); // Hiển thị lỗi
                        }
                    },
                    error: function () {
                        $('#error').text('Có lỗi xảy ra! Vui lòng thử lại.');
                    }
                });
            });
        });

        //Ajax Register
        
        // const $ = document.querySelector.bind(document);
        const password = $('#password_r');
        const passwordConfirm = $('#confirmPassword_r');
        const register = $('#register');
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
