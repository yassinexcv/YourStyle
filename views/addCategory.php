<?php
$categories = new CategoriesController();

if (isset($_POST["submit"])){
    $categories->addCategorie([$_POST['cat_title']]);
   
}
?>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" method="POST" enctype="multipart/form-data" >
    <fieldset>

        <!-- Form Name -->
        <legend>Category</legend>


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label">Nom De Votre Category</label>
            <div class="col-md-4">
                <input name="cat_title" placeholder="titre de votre category" class="form-control input-md" required="" type="text">

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="Add Product">ajouter Category</label>
            <div class="col-md-4">
                <button name="submit" class="btn btn-primary">Add Category</button>
            </div>
        </div>

    </fieldset>
</form>