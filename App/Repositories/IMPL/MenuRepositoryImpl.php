<?php
class MenuRepositoryImpl extends BaseRepository implements MenuRepository {
    public $model_menu;

    public function __construct(){
        $this->model_menu = $this->model('MenuModel');
    }

    public function getMenuList(){
        return $this->model_menu->getMenuList();
    }

    public function getMenusByData($_data = []){
        return $this->model_menu->getMenu($_data);
    }

    public function getMenuById($_id = null){
        return $this->model_menu->getMenuById($_id);
    }

    


    
}

?>