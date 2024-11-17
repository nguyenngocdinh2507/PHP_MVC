<?php

class PostModel extends Model{

protected $_table = '';

public function getPostList() {
    $_table = 'post';
    $orderBy = 'ORDER BY created_at desc';
    return $this->getAll($_table, $orderBy);
}



}

?>