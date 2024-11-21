<?php

class MenuModel extends Model {
    protected $_table = '';

    public function getMenuList(){
        $_table = 'menu';
        return $this->getAll($_table);
    }


    public function getMenuById($id){
        $_table = 'menu';
        return $this->getById($_table,$id);
    }
}

?>