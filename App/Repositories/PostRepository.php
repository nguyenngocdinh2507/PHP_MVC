<?php

interface PostRepository{

    public function getPostList();
    //Data ở đây có thể là Post_id, hoặc là user_id
    public function getPostsByData($data = []);
    
    //Tínhh toán thời gian post đã đăng
    public function timeElapsed($timePost);
    
    //Add new post
    public function addPost($data = []);
    
}

?>