<?php

class PostRepositoryImpl extends BaseRepository implements PostRepository {
    public $model_post, $model_user, $model_menu;

    public function __construct(){
        $this->model_post = $this->model('PostModel');
        $this->model_user = $this->model('UserModel');
        $this->model_menu = $this->model('MenuModel');
    }

    public function getPostList(){
        $posts = $this->model_post->getPostList();
        foreach($posts as $key => $post){
            //Get name 
            $user = $this->model_user->getUserById($post['user_id']);
            $user_name = $user["user_name"];
            $posts[$key]["user_name"] = $user_name;
            //Get time has passed
            $posts[$key]['time_passed'] = $this->timeElapsed($post['created_at']);
            //Get post's menu
            $menu = $this->model_menu->getMenuById($post['menu_id']);
            $name_menu = $menu['name_vn'];
            $posts[$key]['menu_name'] = $name_menu;
        }
        return $posts;
    }

     function getPostsByData($data = []){

    }

    public function timeElapsed($datetime){

        // Đặt múi giờ Việt Nam
        // date_default_timezone_set('Asia/Ho_Chi_Minh');

        // Chuyển timestamp từ định dạng chuỗi sang đối tượng DateTime
        $now = new DateTime(); // Thời gian hiện tại
        $ago = new DateTime($datetime); // Thời gian của bài đăng
        $diff = $now->diff($ago); // Sự khác biệt giữa hai thời gian

        // Tính số giây chênh lệch
        $diffInSeconds = strtotime($now->format('Y-m-d H:i:s')) - strtotime($datetime);

        // Kiểm tra các khoảng thời gian
        if ($diffInSeconds < 60) {
            return 'Vừa xong'; // Dưới 1 phút
        } elseif ($diffInSeconds < 3600) {
            return floor($diffInSeconds / 60) . ' phút trước'; // Dưới 1 giờ
        } elseif ($diffInSeconds < 86400) {
            return floor($diffInSeconds / 3600) . ' giờ trước'; // Dưới 1 ngày
        } elseif ($diffInSeconds < 172800) {
            return 'Hôm qua'; // Dưới 2 ngày
        } elseif ($diffInSeconds < 604800) {
            return floor($diffInSeconds / 86400) . ' ngày trước'; // Dưới 7 ngày
        } elseif ($diffInSeconds < 2419200) {
            return floor($diffInSeconds / 604800) . ' tuần trước'; // Dưới 1 tháng
        } else {
            return $ago->format('d/m/Y'); // Hiển thị dạng ngày/tháng/năm cho lâu hơn
        }
    }
    

}

?>