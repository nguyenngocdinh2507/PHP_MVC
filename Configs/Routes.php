<?php

/**
 * Đường dẫn ảo sẽ trỏ đến đường dẫn thật
 * Sử dụng biểu thức chính quy
 */
$routes = [
    //Defint
    'default_controller' => 'Home',
    //Login
    'dang-nhap' => 'User/login',
    'kiem-tra-dang-nhap' => 'User/checkLogin',
    'dang-xuat' => 'User/logout',
    
    // Register
    'dang-ky' => 'Register/index',

    // Admin
    'trang-quan-li-admin' => 'Admin/Dashboard/index',

    // Client
    //Home
    'trang-chu' => 'Home/index',

    //Post
    'dang-tin' => 'Post/index',
   
    //Product
    'san-pham' => 'Product/index',
    'chi-tiet-san-pham/(.+)' => 'Product/detail/$1',
];

?>