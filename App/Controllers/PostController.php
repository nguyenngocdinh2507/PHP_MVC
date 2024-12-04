<?php 

class PostController extends Controller{
    public $model_home, $repository_menu, $repository_user;
    public $data = [
        'title' => 'Home',
        '_view' => 'Homes/Home',
        'contents' => [
        ]
    ];

    //Khởi tạo
    public function __construct(){
        //Model_home
        $this->model_home = $this->model('HomeModel'); 
        $this->repository_menu = $this->repository('MenuRepository');
        $this->repository_user = $this->repository('UserRepository');
    }

    public function index(){
        $title = 'ADD POST';
        $_view_home = 'Post/Add';
        $_view_leftbar = 'Blocks/Leftbar';
        $contents_home = [
            'users' => $this->repository_user->getUserList(),
            'menus' => $this->repository_menu->getMenuList(),
            'provinces' => $this->model_home->getProvinceList(),
            'districts' => $this->model_home->getDistrictList(),
            'wards' => $this->model_home->getWardList(),

        ];

        $contents_leftbar = [
            'provinces' => $this->model_home->getProvinceList(),
            'menus' => $this->repository_menu->getMenuList(),
        ];  

        $data['title'] = $title;
        $data['_view_home'] = $_view_home;
        $data['_view_leftbar'] = $_view_leftbar;
        $data['contents_home'] = $contents_home;
        $data['contents_leftbar'] = $contents_leftbar;

        $this->render('Layouts/Client_layout', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $menu = $_POST['menu'];
            echo $menu;
            $content = $_POST['newPost__content'];
            echo $content;
            $file = $_FILES['btnAddImage'];
            var_dump( $file);
        }
        // header('Location:/trang-chu');      
    }

}

?>