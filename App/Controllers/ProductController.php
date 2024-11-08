<?php
class ProductController extends Controller {

    public $model_product;
    public $data = [
        'title' => 'Product',
        '_view' => '',
        'contents' => []
    ];
    public function __construct(){
        $this->model_product = $this->model('ProductModel');
    }

    public function index() {
        $products = $this->model_product->getProductList();
        foreach ($products as $key => $value) {
            echo '<div>
                <h1>Id : '.$value->id.'</h1>
                <p>Name : '.$value->name.'</p>
            </div>';
        }
    }

    public function list() {
        $products = $this->model_product->getProductList();
        $title = 'Product List';
        $_view = 'Products/List';
        $contents = [
            'products' => $products,
        ];

        $data['title'] = $title;
        $data['_view'] = $_view;
        $data['contents'] = $contents;

        $this->render('Layouts/Client_layout', $data);
    }

    public function detail($id=1){
        $product = $this->model_product->getProduct($id);
        $title = 'Product Detail';
        $_view = 'Products/Detail';
        $contents = [
            'findId' => $id, 
            'product' => $product,
        ];

        $data['title'] = $title;
        $data['_view'] = $_view;
        $data['contents'] = $contents;

        $this->render('Layouts/Client_layout', $data);
    }
}