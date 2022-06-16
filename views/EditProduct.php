<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $data = new ProductController();
    $product = $data->getProductById($_POST["id"]);

    $products = $data->getProductsByCategory($product["product_category_id"]);
    $categories = new CategoriesController();
    $categories = $categories->getAllCategories();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $data = new ProductController();
    $data->updateProduct();
} else header("Location: dashboard");
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<form class="form-horizontal" method="POST" enctype="multipart/form-data">
    <fieldset>

        <!-- Form Name -->
        <legend>PRODUCTS</legend>


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
            <div class="col-md-4">
                <input name="product_title" value="<?php echo $product['product_title'] ?>" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">

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
                <input name="product_quantity" value="<?php echo $product['product_quantity'] ?>" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_weight">short DESCRIPTION</label>
            <div class="col-md-4">
                <input maxlength = "40" id="product_description" name="short_desc" value="<?php echo $product['short_desc'] ?>" placeholder="PRODUCT DEscription" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">product description</label>
            <div class="col-md-4">
                <input class="form-control" value="<?php echo $product['product_description'] ?>" name="product_description"></input>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="price">prix</label>
            <div class="col-md-4">
                <input type="number" name="product_price" placeholder="prix " value="<?php echo $product['product_price'] ?>" class="form-control input-md" required="" type="text">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="old price">old prix</label>
            <div class="col-md-4">
                <input type="number" name="old_price" placeholder="old prix " value="<?php echo $product['old_price'] ?>" class="form-control input-md" required="" type="text">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="price">image</label>
            <div class="col-md-4">
                <input type="hidden" name="product_current_image" value="<?php echo $product['product_image'] ?>" class="form-control input-md" required="" type="text">
                <img src="./public/products/<?php echo $product['product_image'] ?>" width="400" height="400">


            </div>
            <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
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
            <label class="col-md-4 control-label" for="Add Product">modifier</label>
            <div class="col-md-4">
                <button name="update" class="btn btn-primary">modifier</button>
            </div>
        </div>

    </fieldset>
</form>