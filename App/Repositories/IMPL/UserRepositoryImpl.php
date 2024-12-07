<?php
class UserRepositoryImpl extends BaseRepository implements UserRepository {
    public $model_user;

    public function __construct(){
        $this->model_user = $this->model('UserModel');
    }

    public function getUserList(){
        return $this->model_user->getUserList();
    }

    public function getUsersByData($_data = []){
        return $this->model_user->getUserByData($_data);
    }

    public function getUserById($_id = null){
        return $this->model_user->getUserById($_id);
    }

    public function addUser($data = []){
        return $this->model_user->addUser($data);
    }


    
}

?>