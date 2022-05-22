<?php
 
 if(isset($_POST["product_id"])){
     $id = $_POST["product_id"];
     $data = new ProductController();
     $product = $data->getProduct($id);

     if($_SESSION["product_".$id]["title"]=== $_POST["product_title"]){
         Session
     }
     
 }