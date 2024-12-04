<?php

class AccountController extends Controller{
    public $repository_user;

    public function __construct(){
        $this->repository_user = $this->repository('UserRepository');
    }

    public function index () {

    }

    public function login () {
        $this->render('Layouts/Login_layout');
    }

    public function checkLogin(){
        
        if(!$_SERVER['REQUEST_METHOD'] === 'POST'){
            exit;
        }
        
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            //Data để tìm dữ liệu
            $_data = [
                'user_name' => $username,
            ];

            $user = $this->repository_user->getUsersByData( $_data);



            if($user){
                //check password
                $checkPassWord = password_verify($password, $user['password']);
                
                //check password
                $checkPassWord = password_verify($password, $user['password']);
                if($checkPassWord){

                    $_SESSION['user'] = $user;
                    if($user['user_authorization'] == 1){
                        // header('Location:/trang-chu'); //Chuyển hướng
                        echo '/trang-chu';
                        exit;
                    }else{
                        echo '/trang-quan-li-admin';
                        exit;
                    }
                }else{
                    echo "Sai mật khẩu";
                    exit;
                }
            }else{
                echo "Tài khoản không tòn tại";
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


    public function register(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $username = trim($_POST['username']);
            $email = $_POST['email'];
            $password = $_POST['password']; 
            $confirmPassword = $_POST['confirmPassword'];
            // Mã hóa Passwords
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $users = $this->repository_user->getUserList();

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
            
            $result = $this->repository_user->addUser($_data);
            if($result == true){
                $_SESSION['user'] = $this->repository_user->getUserById($user_id);
                if($_SESSION['user']['user_authorization'] == 1){
                    header('Location:/trang-chu'); //Chuyển hướng
                    exit;
                }
            }

        }
    }


}

?>