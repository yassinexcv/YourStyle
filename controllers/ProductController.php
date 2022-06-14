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

    public function uploadPhoto($oldImage = null)
    {
        $dir = "public/products";
        $time = time();
        $name = str_replace(' ', '-', strtolower($_FILES["image"]["name"]));
        $type = $_FILES["image"]["type"];
        $ext = substr($name, strpos($name, '.'));
        $ext = str_replace('.', '', $ext);
        $name = preg_replace("/.[^.\s]{3,4}$/", "", $name);
        $imageName = $name . '-' . $time . '.' . $ext;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $dir . "/" . $imageName)) {
            return $imageName;
        }
        return $oldImage;
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
}  