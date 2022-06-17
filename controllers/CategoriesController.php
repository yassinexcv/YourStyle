<?php

class CategoriesController{
    public function getAllCategories(){
        return Category::getAll();
    }
    public function addCategorie(){
        if(isset($_POST['submit'])){
            $data = array(
              'cat_title' => $_POST['cat_title']
            );
            $result = Category::addCategorie($data);
            if($result === "ok"){
              Session::set("success","Category added successfully");
              header("Location: " . BASE_URL."dashboard");
            }else{
              echo $result;
            }
          }

    }
    public function getCategoryById($id){
        return Category::getCategoryById($id);
    }

    public function deleteCategorie(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $result = Category::deleteCategory($id);
            if($result === "ok"){
              Session::set("success","Category deleted successfully");
              header("Location: " . BASE_URL."dashboard");
            }else{
              echo $result;
            }
          }

    }
    
}
                                                        
                                                    