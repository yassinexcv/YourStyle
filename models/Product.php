<?php

class Product{
    static public function getAll(){
       $stmt = DB::connect()->prepare('SELECT * FROM products');
         $stmt->execute();
         return $stmt->fetchAll();
        //  $stmt->close();
         $stmt = null;
    }
    static public function getProductsByCat($data){
      $id = $data['id'];
      try{
        $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_category_id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll();
        $stmt = null;
      }catch(PDOException $ex){
        echo "erreur ".$ex->getMessage();
      }
    }
    static public function getProductById($data){
      $id = $data['id'];
      try{
        $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch();
        $stmt = null;
      }catch(PDOException $ex){
        echo "erreur ".$ex->getMessage();
      }
    }
    static public function createProduct($data){
     
        $stmt = DB::connect()->prepare('INSERT INTO products (product_title,product_category_id,product_price,old_price,product_description,product_image,product_quantity,short_desc) 
        VALUES (:product_title,:product_category_id,:product_price,:old_price,:product_description,:product_image,:product_quantity,:short_desc)');

          $stmt->bindParam(':product_title', $data['product_title']);
          $stmt->bindParam(':product_category_id', $data['product_category_id']);
          $stmt->bindParam(':product_price',  $data['product_price']);
          $stmt->bindParam(':old_price',  $data['old_price']);
          $stmt->bindParam(':product_description', $data['product_description']);
          $stmt->bindParam(':product_image',  $data['product_image']);
          $stmt->bindParam(':product_quantity', $data['product_quantity']);
          $stmt->bindParam(':short_desc', $data['short_desc']);
          if ($stmt->execute()) {
            return "ok";
          }else{
            return "error";
          }
          $stmt = null;
}
    static public function updateProduct($data){
      $id = $data['id'];
      $stmt = DB::connect()->prepare('UPDATE products SET product_title = :product_title,product_category_id = :product_category_id,product_price = :product_price,old_price = :old_price,product_description = :product_description,product_image = :product_image,product_quantity = :product_quantity,short_desc = :short_desc WHERE product_id = :id');
      $stmt->bindParam(':product_title', $data['product_title']);
      $stmt->bindParam(':product_category_id', $data['product_category_id']);
      $stmt->bindParam(':product_price',  $data['product_price']);
      $stmt->bindParam(':old_price',  $data['old_price']);
      $stmt->bindParam(':product_description', $data['product_description']);
      $stmt->bindParam(':product_image',  $data['product_image']);
      $stmt->bindParam(':product_quantity', $data['product_quantity']);
      $stmt->bindParam(':short_desc', $data['short_desc']);
      $stmt->bindParam(':id', $id);
      if ($stmt->execute()) {
        return "ok";
      }else{
        return "error";
      }
      $stmt = null;

}
    static public function deleteProduct($id){
      
      $stmt = DB::connect()->prepare('DELETE FROM products WHERE product_id = :id');
      $stmt->bindParam(':id', $id);
      if ($stmt->execute()) {
        return "ok";
      }else{
        return "error";
      }
      $stmt = null;
}
}