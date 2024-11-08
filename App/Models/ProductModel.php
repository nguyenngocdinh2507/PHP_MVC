<?php
class ProductModel{
    public function getProductList(){
        return [
            (object)[
                'id'=> 1,
                'name'=> 'Product1'
            ],
            (object)[
                'id'=> 2,
                'name'=> 'Product2'
            ]
        ];
    }

    public function getProduct($id){
        $products = [
            (object)[
                'id'=> 1,
                'name'=> 'Product1'
            ],
            (object)[
                'id'=> 2,
                'name'=> 'Product2'
            ]
        ];
        $prd = (object)[];

        foreach($products as $key => $product){
            if($product->id == $id){
                $prd = $product;
            }
        }
        return $prd;
    }
}