<?php

$data = new ProductController();
$products = $data->getProductsByCategory($_GET["id"]);
?>

<div>
    <?php
        if(count($products)==0){
            echo "il y a pas de produit dans cette categorie";
        }
    ?>
    <div class="row">
        <?php foreach($products as $product): ?>
        <div class="col-md-6">
            <div class="card mb-4 shadow-sm">
                <img src="<?php echo BASE_URL; ?>./public/products/<?= $product['product_image'] ?>" alt="<?php echo $product['product_title']; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['product_title']; ?></h5>
                    <p class="card-text"><?php echo $product['short_desc']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="?page=show&id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                        </div>
                        <div class="card-footer">
                        <small class="badge badge-danger"><?php echo $product['product_price']; ?>$</small>    
                        <strike class="badge badge-dark p-2"><?php echo $product['old_price']; ?>$</strike>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


