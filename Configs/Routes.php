<?php

/**
 * Đường dẫn ảo sẽ trỏ đến đường dẫn thật
 * Sử dụng biểu thức chính quy
 */
$routes = [
    //Defint
    'default_controller' => 'Home',
    //Login
    'dang-nhap' => 'Login',
    'kiem-tra-dang-nhap' => 'Login/checkLogin',
    'dang-xuat' => 'Login/logout',
    
    // Register
    'dang-ky' => 'Register/index',

    // Admin
    'trang-quan-li-admin' => 'Admin/Dashboard/index',

    // Client
    //Home
    'trang-chu' => 'Home/index',
   
    //Product
    'san-pham' => 'Product/index',
    'chi-tiet-san-pham/(.+)' => 'Product/detail/$1',
];

?>