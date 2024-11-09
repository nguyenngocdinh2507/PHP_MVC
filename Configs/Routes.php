<?php

/**
 * Đường dẫn ảo sẽ trỏ đến đường dẫn thật
 * Sử dụng biểu thức chính quy
 */
$routes = [
    //Defint
    'default_controller' => 'Home',

    //Home
    'trang-chu' => 'Home/index',
   
    //Product
    'san-pham' => 'Product/index',
    'chi-tiet-san-pham/(.+)' => 'Product/detail/$1',
];