<?php

class LoginController extends Controller{

    public function __construct(){

    }

    public function index () {
        $this->render('Layouts/Login_layout');
    }

}

?>