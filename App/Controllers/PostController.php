<?php 

class PostController extends Controller{
    public $model_home, $repository_menu;
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
    }

    public function index(){
        $title = 'Home';
        $_view_home = 'Post/Add';
        $_view_leftbar = 'Blocks/Leftbar';
        $contents_home = [
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
        
    }

}

?>