<?php
class Category{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll();
        // $stmt->close();
        $stmt = null;
    }

    static public function addCategorie($data){
     
        $stmt = DB::connect()->prepare('INSERT INTO categories (cat_title) VALUES (:cat_title)');

        $stmt->bindParam(':cat_title', $data['cat_title']);
        if ($stmt->execute()) {
        return "ok";
        }else{
        return "error";
        }
        $stmt = null;
    }
    static public function getCategoryById($id){
      try{
        echo $id;
        exit;
        $stmt = DB::connect()->prepare('SELECT * FROM categories WHERE cat_id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch();
        $stmt = null;
      }catch(PDOException $ex){
        echo "erreur ".$ex->getMessage();
      }
    }
    static public function deleteCategory($id){
      $stmt = DB::connect()->prepare('DELETE FROM categories WHERE cat_id = :id');
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
        return "ok";
        }else{
        return "error";
        }
        $stmt = null;
}
}