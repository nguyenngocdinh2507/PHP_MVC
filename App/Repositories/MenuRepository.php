<?php

interface MenuRepository {
    
    public function getMenuList();
    public function getMenusByData($data = []);
    public function getMenuById($id);
}

?>