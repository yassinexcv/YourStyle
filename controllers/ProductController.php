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
    public function addProduct(){
      if(isset($_POST['submit'])){
        $data = array(
          'product_title' => $_POST['product_title'],
          'product_category_id' => $_POST['product_category_id'],
          'product_price' => $_POST['product_price'],
          'old_price' => $_POST['old_price'],
          'product_description' => $_POST['product_description'],
          'product_image' => $this->uploadPhoto(),
          'product_quantity' => $_POST['product_quantity'],
          'short_desc' => $_POST['short_desc']


        );
        $result = Product::createProduct($data);
        if($result === "ok"){
          Session::set("success","Product added successfully");
          header("Location: " . BASE_URL."dashboard");
        }else{
          echo $result;
        }
      }
    }

    public function uploadPhoto()
    {
        $dir = "public/products";
        $image = $_FILES['image'];
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $imageName = time() . "." . $ext;
         move_uploaded_file($image["tmp_name"], $dir . "/" . $imageName);
         return $imageName;
    }
    public function updateProduct()
    {
      if(isset($_POST['update'])){
        $oldImage = $_POST['old_image'];
        $data = array(
          'product_title' => $_POST['product_title'],
          'product_category_id' => $_POST['product_category_id'],
          'product_price' => $_POST['product_price'],
          'old_price' => $_POST['old_price'],
          'product_description' => $_POST['product_description'],
          'product_quantity' => $_POST['product_quantity'],
          'product_image' => $this->uploadPhoto($oldImage),
          'short_desc' => $_POST['short_desc'],
          'id' => $_POST['product_id']
        );
        $result = Product::updateProduct($data);
        if($result === "ok"){
          Session::set("success","Product updated successfully");
          header("Location: " . BASE_URL."dashboard");
        }else{
          echo $result;
        }
      }
    }
    public function deleteProduct(){
      if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $result = Product::deleteProduct($id);
        if($result === "ok"){
          Session::set("success","Product deleted successfully");
          header("Location: " . BASE_URL."dashboard");
        }else{
          echo $result;
        }
      }
    }
}  