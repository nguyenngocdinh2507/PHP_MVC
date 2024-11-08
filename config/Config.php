<?php 
    $servername   = 'localhost';
    $username = 'root';
    $password = '';
    $database = '';
    // Create connection
    $connect = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    
    if($connect == false){
        echo "Kết nối data thất bại";exit;
    }
?>