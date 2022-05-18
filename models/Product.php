<?php

class Product{
    static public function getAll(){
       $stmt = DB::connect()->prepare('SELECT * FROM products');
         $stmt->execute();
         return $stmt->fetchAll();
        //  $stmt->close();
         $stmt = null;
    }
}