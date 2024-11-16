<?php
class HomeController extends Controller {

    public $model_home, $model_user;
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
        $this->model_user = $this->model('UserModel');
    }

    // Home
    public function index(){
        //Set data
        $title = 'Home';
        $_view_home = 'Homes/Home';
        $_view_leftbar = 'Blocks/Leftbar';
        $contents_home = [
        ];

        $contents_leftbar = [
            'provinces' => $this->model_home->getProvinceList(),
            'menus' => $this->model_home->getMenuList(),
        ];

        $data['title'] = $title;
        $data['_view_home'] = $_view_home;
        $data['_view_leftbar'] = $_view_leftbar;
        $data['contents_home'] = $contents_home;
        $data['contents_leftbar'] = $contents_leftbar;

        $this->render('Layouts/Client_layout', $data);
    }

}
