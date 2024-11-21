<?php

$repositories_dir = scandir(_DIR_ROOT.'/App/Repositories');
// echo ('<pre>');
// var_dump($repositories_dir);
// echo ('</pre>');
if(!empty($repositories_dir)){
    foreach($repositories_dir as $item){
        if($item!= '.' && $item!= '..' && $item!= 'IMPL' && file_exists(_DIR_ROOT.'/App/Repositories/'.$item)){
            require_once _DIR_ROOT.'/App/Repositories/'.$item; //Load $item
        }
    }
}
class BaseRepository {
    
    // Load repositories
    

    public function model($model){
        // Kiểm tra file tồn tại
        if(file_exists(_DIR_ROOT.'/App/Models/'.$model.'.php')){
            require_once _DIR_ROOT.'/App/Models/'.$model.'.php';

            if(class_exists($model)){
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
}

?>