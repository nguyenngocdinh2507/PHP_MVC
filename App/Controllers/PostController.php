<?php 

class PostController extends Controller{
    public $model_home, $repository_menu, $repository_user,$repository_post;
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
        $this->repository_post = $this->repository('PostRepository');
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
            if(!isset($_SESSION['user'])){
                echo "SESSION IS NOT ALREADY";
                exit();
            }
            $user = $_SESSION['user'];
            $menu = $_POST['menu'];
            $content = $_POST['newPost__content'];
            //Xu li file
            $file = $_FILES['btnAddImage'];
            $fileName = $file['name'];
            $fileTmpPath = $file['tmp_name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = $user['user_name'].date("_Y_m_d_H_i_s.").$fileExtension;
            $uploadDir = _DIR_ROOT.'/Public/Assets/Images/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa tồn tại
            }
            $destination = $uploadDir . $newFileName;
            // Di chuyển file từ thư mục tạm sang thư mục đích
            if (move_uploaded_file($fileTmpPath, $destination)) {
                echo "Upload thành công! File được lưu tại: " . $destination;
            } else {
                echo "Có lỗi xảy ra khi lưu file.";
            }
            echo $uploadDir;
            echo ('<pre>');
            print_r($file);
            echo ('</pre>');
            $location_value = $_POST['location_value'];;
            $phone = $_POST['phone'];

            //Lay post user

            $_data = [
                'user_id' => $user['user_id'],
                'menu_id' => $menu,
                'content' => $content,
                'image' => $newFileName,
                'location' => $location_value,
                'phone_number' => $phone

            ];
            $result =$this->repository_post->addPost($_data);
            if($result){
                header('Location:/trang-chu');      
                exit();
            }else{
                echo "Errors ADD POST";
            }

        }
    }

    //
    public function getDistrictsByProvince(){
        if(isset($_GET['province_id'])){
            $province_id = $_GET['province_id'];
            $data = [
                'province_id' => $province_id
            ];
            $districts = $this->model_home->getDistrictsByProvince($data);
            echo json_encode($districts);
        }
    }

    //
    public function getWardsByDistrict(){
        if(isset($_GET['district_id'])){
            $district_id = $_GET['district_id'];
            $data = [
                'district_id' => $district_id
            ];
            $wards = $this->model_home->getWardsByDistrict($data);
            echo json_encode($wards);
        }
    }

}
?>