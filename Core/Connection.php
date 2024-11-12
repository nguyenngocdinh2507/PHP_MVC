<?php
class Connection{
    /**
     * Connect database by PDO connection
     */
    private static $instance = null, $conn = null;
    private function __construct($config){
        //Ket noi db
        try{
            //Ccấu hình DSN
            $dsn = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];
            
            //Cấu hình $options
            /**
             * -Cấu hình utf-8
             * Cấu hình ngoại lệ khi truy vấn bị lỗi
             */
            $options = [
                PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO:: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            //Câu lệnh kết nối
            $con = new PDO($dsn, $config['user'], '', $options);
            self::$conn = $con;

        }catch(Exception $e){
            $mess = $e->getMessage();
            die($mess);
        }
    }

    //Check connection ket noi
    public static function getInstance($config){
        if(self::$instance == null){
            $connection = new Connection($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}

?>