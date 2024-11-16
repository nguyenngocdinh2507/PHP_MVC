<?php

class RegisterController extends Controller{
    public $model_user;

    public function __construct(){
        $this->model_user = $this->model('UserModel');
    }

    public function index(){
        if(isset($_POST['register'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password']; 
            $confirmPassword = $_POST['confirmPassword'];
            // Mã hóa Passwords
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $users = $this->model_user->getUserList();

            if($password != $confirmPassword){
                if (isset($_SERVER['HTTP_REFERER'])) {
                    $previousPage = $_SERVER['HTTP_REFERER'];
                    echo "<script>
                        alert('Sai mật khẩu');
                        window.location.href = '$previousPage';
                    </script>";
                    exit;
                }   
            }

            foreach($users as $user){
                if($user['user_name'] == $username){
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $previousPage = $_SERVER['HTTP_REFERER'];
                        echo "<script>
                            alert('Trùng tên đăng nhập');
                            window.location.href = '$previousPage';
                        </script>";
                        exit;
                    }   
                }
            }

            $user_id = count($users);
            $_data = [
                'user_id' => $user_id,
                'user_name' => $username,
                'email' => $email,
                'password' => $hashedPassword,
                'user_authorization' => 1
            ];
            
            $result = $this->model_user->addUser($_data);
            if($result == true){
                $_SESSION['user'] = $this->model_user->getUserById($user_id);
                if($_SESSION['user']['user_authorization'] == 1){
                    header('Location:/trang-chu'); //Chuyển hướng
                    exit;
                }
            }

        }
        

    }

}

?>