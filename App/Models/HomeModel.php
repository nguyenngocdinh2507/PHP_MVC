<?php
//Duy nhất em này gọi trực tiếp không thông qua repository, vì lười
//Location
// Kế thừa từ class model
class HomeModel extends Model{
    protected $_table = '';

    public function getProvinceList() {
        $_table = 'province';
        return $this->getAll($_table);
    }

    public function getDistrictList() {
        $_table = 'district';
        return $this->getAll($_table);
    }
    
    public function getWardList() {
        $_table = 'wards';
        return $this->getAll($_table);
    }

    //lấy huyện theo tỉnh
    // $data=[] dùng hàm getByData
    public function getDistrictsByProvince($data=[]) {
        $_table = 'district';
        return $this->getByDatas($_table, $data);
    }
    public function getWardsByDistrict($data=[]) {
        $_table = 'wards';
        return $this->getByDatas($_table, $data);
    }
}