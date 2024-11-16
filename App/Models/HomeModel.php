<?php
// Kế thừa từ class model
class HomeModel extends Model{
    protected $_table = '';

    public function getProvinceList() {
        $_table = 'province';
        return $this->getAll($_table);
    }

    public function getMenuList(){
        $_table = 'menu';
        return $this->getAll($_table);
    }

    

}