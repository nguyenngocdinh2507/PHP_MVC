<?php

class DashboardController extends Controller{
    public function index(){
        //Kiem tra admin
        if(isset($_SESSION['user']) && $_SESSION['user']['user_authorization'] == 0){
            echo 'oke';
            $this->render('Admin/Dashboard');
            exit;
        }

        header('Location:/trang-chu'); //Điều hướng url
        

    }
}
?>