<?php 

class UserModel extends Model{

protected $_table = '';

public function getUserList() {
    $_table = 'user';
    return $this->getAll($_table);
}

public function getUserByData( $data=[]){
    $_table = 'user';
    return $this->getByData($_table, $data);
}

public function getUserById($id){
    $_table = 'user';
    $s = $this->getById($_table, 1);
    return $this->getById($_table, $id);
}

public function addUser( $data=[]){
    $_table = 'user';
    $result = $this->insert($_table, $data);
    return $result;
}

}
?>