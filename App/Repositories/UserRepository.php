<?php 

interface UserRepository {

    public function getUserList() ;
    public function getUsersByData($_data = []);
    public function getUserById($_id = null);

}

?>