<?php
class HomeController extends Controller {

    public $model_home;
    public $data = [
        'title' => 'Home',
        '_view' => 'Homes/Home',
        'contents' => []
    ];

    //Khởi tạo
    public function __construct(){
        //Model_home
        $this->model_home = $this->model('HomeModel'); 
    }

    // Home
    public function index(){
        //Set data
        $title = 'Home';
        $_view = 'Homes/Home';
        $contents = [
            
        ];
        $data['title'] = $title;
        $data['_view'] = $_view;
        $data['contents'] = $contents;

        $this->render('Layouts/Client_layout', $data);
    }

}
