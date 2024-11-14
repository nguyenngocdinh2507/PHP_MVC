<?php
class Route{
    function __construct(){

    }

    function handleRoute($url){
        global $routes;

        //unset dữ liệu không cần xử lí
        unset($routes['default_controller']);

        //Delete '/'
        $url = trim($url, '/');

        
        if(empty($url)){
            $url = '/';
        }

        $handleUrl = $url;
        // echo $handleUrl;

        if(!empty($routes)){
            foreach($routes as $key => $value){
                if(preg_match('~'.$key.'~is', $url)){
                    // $handleUrl
                    $handleUrl = preg_replace('~'.$key.'~is', $value, $url); //URL nào hợp với KEY sẽ bị đổi thành Value
                }
            }
        }
        // echo $handleUrl;
        return $handleUrl;
    }
}

?>