<?php
class ProductModel extends Model{
    protected $_table = 'category';
    public function getProductList(){
        return $this->getAll($this->_table);
    }

    public function getProduct($id){

    }
}