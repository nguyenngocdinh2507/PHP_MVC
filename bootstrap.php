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


/**
 * Tự động load config
 */

$config_dir = scandir('Configs');
if(!empty($config_dir)){
    foreach($config_dir as $item){
        if($item!= '.' && $item!= '..' && file_exists('Configs/'.$item)){
            require_once 'Configs/'.$item; //Load $item
        }
    }
}

require_once 'Core/Route.php'; //Load Route
require_once 'App/App.php'; // Load App
//Kiểm tra config và load database
if(!empty($config['database'])){
    $db_config = array_filter($config['database']);
    if(!empty($db_config)){
        require_once 'Core/Connection.php';
        require_once 'Core/Database.php';
    }
}
require_once 'Core/Model.php'; // Load Model
require_once 'Core/Controller.php'; //Load Controller
?>