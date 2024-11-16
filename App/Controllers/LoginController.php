<?php

class LoginController extends Controller{
    public $model_user;

    public function __construct(){
        $this->model_user = $this->model('UserModel');
    }

    public function index () {
        $this->render('Layouts/Login_layout');
    }

    public function checkLogin(){

        if(!isset($_POST['login'])){
            exit;
        }
        
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $_data = [
                'user_name' => $username,
            ];

            $user = $this->model_user->getUser( $_data);

            //check password
            $checkPassWord = password_verify($password, $user['password']);

            if($user){
                //check password
                $checkPassWord = password_verify($password, $user['password']);
                if($checkPassWord){

                    $_SESSION['user'] = $user;
                    if($user['user_authorization'] == 1){
                        header('Location:/trang-chu'); //Chuyển hướng
                        exit;
                    }else{
                        // header("HTTP/1.1 301 Moved Permanently");
                        echo 'admin';
                        exit;
                    }
                }else{
                    echo "<script>
                    alert('Sai mật khẩu');
                    window.location.href = '/dang-nhap';
                    </script>";
                    exit;
                }
            }else{
                echo "<script>
                alert('Tài khoản không tồn tại');
                window.location.href = '/dang-nhap';
                </script>";
                exit;
            }

            
        } else {
            require_once('./App/Errors/404.php');
        }
    }

    //Logout
    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']); // clear session data from $_SESSION variable
        }
        //Veef lai trang truoc do
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previousPage = $_SERVER['HTTP_REFERER'];
            echo "<script>
                window.location.href = '$previousPage';
            </script>";
        } else {
            // Nếu không có trang trước đó, chuyển hướng đến một trang mặc định
            echo "<script>
                window.location.href = '/trang-chu';
            </script>";
        }
        exit;
    }

}

?>