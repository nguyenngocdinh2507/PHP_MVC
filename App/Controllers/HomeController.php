<?php
class HomeController extends Controller {

    public $model_home, $repository_user, $repository_post, $repository_menu;
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
        $this->repository_user = $this->repository('UserRepository');
        $this->repository_menu = $this->repository('MenuRepository');
        $this->repository_post = $this->repository('PostRepository');
    }

    // Home
    public function index(){
        //Set data
        $title = 'Home';
        $_view_home = 'Post/List';
        $_view_leftbar = 'Blocks/Leftbar';
        $contents_home = [
            'posts' => $this->repository_post->getPostList(),
            'users' => $this->repository_user->getUserList(),
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


}
