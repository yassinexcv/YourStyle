<?php


class ProductController {
    public function getAllProducts(){
       $products = Product::getAll();
         return $products;
    }
    public function getProductsByCategory($cat_id){
      if(isset($cat_id)){
        $data = array(
          'id' => $cat_id
        );
        $products = Product::getProductsByCat($data);
        return $products;
      }
    }
    public function getProductById($id){
      if(isset($id)){
        $data = array(
          'id' => $id
        );
        $product = Product::getProductById($data);
        return $product;
      }
    }
    public function getProduct(){
      if(isset($_POST["product_id"])){
        $data = array(
          'id' => $_POST["product_id"]
        );
        $product = Product::getProductById($data);
        return $product;
      }
    }
    
}