<?php

$categories = new CategoriesController();
$categories = $categories->getAllCategories();

if (isset($_POST["submit"])){
    $produit = new ProductController();
    $produit->addProduct();
   
}



?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" method="POST" enctype="multipart/form-data">
    <fieldset>

        <!-- Form Name -->
        <legend>PRODUCTS</legend>


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
            <div class="col-md-4">
                <input name="product_title" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
            <div class="col-md-4">
            <select name="product_category_id" class="form-control">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['cat_id'] ?>">
                            <?php echo $category['cat_title'] ?>
                        </option>
                    <?php endforeach; ?>
                 
                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="available_quantity"> QUANTITY</label>
            <div class="col-md-4">
                <input  name="product_quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_weight">short DESCRIPTION</label>
            <div class="col-md-4">
                <input id="product_description" name="short_desc" placeholder="PRODUCT DEscription" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">product description</label>
            <div class="col-md-4">
                <textarea class="form-control"  name="product_description"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name_fr">prix</label>
            <div class="col-md-4">
                <input name="product_price" placeholder="prix " class="form-control input-md" required="" type="text">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name_fr">old prix</label>
            <div class="col-md-4">
                <input name="old_price" placeholder="old prix " class="form-control input-md" required="" type="text">

            </div>
        </div>

      
               <!-- File Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="filebutton">main_image</label>
                    <div class="col-md-4">
                        <input name="image" class="input-file" type="file">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Add Product">Add Product</label>
                    <div class="col-md-4">
                        <button name="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </div>

    </fieldset>
</form>