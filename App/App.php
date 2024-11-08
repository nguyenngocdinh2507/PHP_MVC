<?php
    class App{
        private $__controller, $__action, $__params, $__routes; 

        public function __construct()
        {

            //Call routers
            global $routes;

            $this->__routes = new Route();

            if(!empty($routes['default_controller'])){
                $this->__controller = $routes['default_controller'];
            }
            $this->__action = 'index';
            $this->__params = [];
            $this->handleUrl();
        }

        //Lấy đường dẫn
        function getUrl(){
            if(!empty($_SERVER['PATH_INFO'])){
                $url = $_SERVER['PATH_INFO'];
            }else{
                $url = '/';
            }
            return $url;
        }

        //Xử lí đường dẫn chữ hoa, chữ thường (THêm controller vào đuôi để trỏ đến file)
        function fixUrl($url){
            return $url."Controller";
        }

        //Xử lí đường dẫn/ Handle url
        public function handleUrl(){
            
            //Get url/Lấy đường dẫn
            $url = $this->getUrl();
            //Lấy url sau khi được xử lí ở router
            $url = $this->__routes->handleRoute($url);


            //Cắt chuỗi thành array
            $urlArr = array_filter(explode("/", $url)); 

            //Chỉnh lại array về đúng array bắt đầu = 0.
            // $urlArr = array_values($urlArr);
            $urlCheck = '';

            if(!empty($urlArr)){

                foreach($urlArr as $key => $item){
                    $urlCheck .= $item.'/';
                    $fileCheck = rtrim($urlCheck, '/'); //Xóa / phải
                    $fileArray = explode("/", $fileCheck);
                    $fileArray[count($fileArray)-1] = ucfirst($fileArray[count($fileArray)-1]); //Viết hoa chữ cái đầu
                    $fileCheck = implode("/", $fileArray);

                    //Lấy đường dẫn chuẩn. Lấy Controller. Action Param. urlArr lấy sẵn rồi nên trừ đừng khi nào thoát.
                    if(!empty($urlArr[$key-1])){
                        unset($urlArr[$key-1]);
                    }
    
                    if(file_exists('App/Controllers/'.($fileCheck).'Controller.php')){ //Kiểm tra file tồn tại, nếu vào được sẽ lấy được đường dẫn chính xác.Admin/Dashboard sẽ vào được
                        $urlCheck = $fileCheck;
                        break; // Tới được đường dẫn chuẩn thì thoát ra        Admin/Dashboard
                    }
                }

                // Chỉnh lại array về đúng array bắt đầu = 0.
                $urlArr = array_values($urlArr);

            }
            
            //Controller
            if(!empty($urlArr[0])){
                $this->__controller = ucfirst($urlArr[0]);//Viết hoa chữ đầu
            }else{
                $this->__controller = ucfirst($this->__controller);//Viết hoa chữ đầu
            }
            //Theem controller sau filename.Tại vì người code khúc này không đặt tên cho file có Controller mà mình đặt vậy nên mình tự thêm
            $this->__controller = $this->fixUrl($this->__controller);

            if(empty($urlCheck)){
                $urlCheck = $this->__controller;
            }else{
                $urlCheck = $this->fixUrl($urlCheck);
            }


            if(file_exists('App/Controllers/'.($urlCheck).'.php')){ //Kiểm tra file tồn tại
                require_once 'Controllers/'.($urlCheck).'.php'; //Chỉ định tệp quan trọng
                //Kiểm tra class tồn tại
                echo 'Controllers/'.($urlCheck).'.php' . '<br />';
                echo $this->__controller;
                if(class_exists($this->__controller)){
                    echo "ZOO";
                    //Đổi thành object
                    $this->__controller = new $this->__controller();
                    // var_dump($this->__controller);
                    unset($urlArr[0]);
                }else{
                    Echo '<br><h4 style="color:red" >Không tìm thấy Controller</h4><br/>';
                    $this->loadError();
                }

            }else{
                Echo '<br><h4 style="color:red" >Không tìm thấy File</h4><br/>';
                $this->loadError();
            }

            //Action
            if(!empty($urlArr[1])){
                $this->__action = $urlArr[1];
                unset($urlArr[1]);
            }
            // echo $this->__action;
            
            
            //Xử lí paramss
            $this->__params = array_values($urlArr);
            
            //Kiểm tra method tồn tại
            if(method_exists($this->__controller, $this->__action)){
                //Gọi hàm phương thức dưới dạng mảng với thanh số không xác định
                call_user_func_array([$this->__controller, $this->__action], $this->__params);
            }else{
                $this->loadError();
            }
            

        }

        //Load lỗi
        public function loadError($name = '404'){
            require_once 'Errors/'.$name.'.php';
        }
    }