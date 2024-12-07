<?php
class Controller{

    //Call model
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

     //Call repository
     public function repository($repository){
        // Kiểm tra file tồn tại
        $repository .= 'Impl';
        if(file_exists(_DIR_ROOT.'/App/Repositories/IMPL/'.$repository.'.php')){
            require_once _DIR_ROOT.'/App/Repositories/IMPL/'.$repository.'.php';

            if(class_exists($repository)){
                $repository = new $repository();
                return $repository;
            }
        }
        return false;
    }

    //Render view
    public function render($view, $data=[]){
        //Đổi key của mảng thành biến 
        extract($data); 
        
        // Kiểm tra file tồn tại
        if(file_exists(_DIR_ROOT.'/App/Views/'.$view.'.php')){
            require_once _DIR_ROOT.'/App/Views/'.$view.'.php';
        }
    }
}

?>