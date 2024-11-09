<?php

//Define root
define('_DIR_ROOT', __DIR__); // Directory

//Handle http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ){
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
// echo $_SERVER['DOCUMENT_ROOT'];echo '<br/>';echo _DIR_ROOT ;echo '<br/>';echo $web_root; ////Dòng này mình không cần

//Define web root
define('_WEB_ROOT', $web_root);




require_once 'Configs/Routes.php'; //Load routes
require_once 'Core/Route.php'; //Load Route
require_once 'App/App.php'; // Load App
require_once 'Core/Controller.php'; //Load Controller