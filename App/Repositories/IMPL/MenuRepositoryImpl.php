<?php
class MenuRepositoryImpl extends BaseRepository implements MenuRepository {
    public $model_Menu;

    public function __construct(){
        $this->model_Menu = $this->model('MenuModel');
    }

    public function getMenuList(){
        return $this->model_Menu->getMenuList();
    }

    public function getMenusByData($_data = []){
        return $this->model_Menu->getMenu($_data);
    }

    public function getMenuById($_id = null){
        return $this->model_Menu->getMenuById($_id);
    }

    


    
}

?>