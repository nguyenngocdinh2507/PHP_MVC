<?php

/**
 * Đường dẫn ảo sẽ trỏ đến đường dẫn thật
 * Sử dụng biểu thức chính quy
 */
$routes = [
    //Defint
    'default_controller' => 'Home',
    //Login
    'dang-nhap' => 'Account/login',
    'kiem-tra-dang-nhap' => 'Account/checkLogin',
    'dang-xuat' => 'Account/logout',
    // Register
    'dang-ky' => 'Account/register',
    //Get District, Ward

    'lay-huyen' => 'Post/getDistrictsByProvince',
    'lay-phuong' => 'Post/getWardsByDistrict',
    
    // Admin
    'trang-quan-li-admin' => 'Admin/Dashboard/index',

    // Client
    //Home
    'trang-chu' => 'Home/index',

    //Post
    'dang-tin' => 'Post/index',
    'them-tin' => 'Post/add',
   
    //Product
    'san-pham' => 'Product/index',
    'chi-tiet-san-pham/(.+)' => 'Product/detail/$1',
];

?>