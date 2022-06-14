<?php

$data = new ProductController();
$products = $data->getProductsByCategory($_GET["id"]);
?>

<div>

    <?php
    if (count($products) == 0) {
        echo "il y a pas de produit dans cette categorie";
    }
    ?>
    <!-- <div class="row">
        <?php foreach ($products as $product) : ?>
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
    </div> -->
    <section class="py-5" style="background-image: url('https://ecommerce.fm/wp-content/uploads/2020/07/fashion-ecommerce-scaled.jpg');">

        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($products as $product) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo BASE_URL; ?>./public/products/<?= $product['product_image'] ?>" alt="<?php echo $product['product_title']; ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['product_title']; ?></h5>
                                <p class="card-text"><?php echo $product['product_description']; ?></p>
                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">Fancy Product</h5>
                                        <p class="text-muted">$<?php echo $product['product_price']; ?></p>
                                        <strike class="badge badge-dark p-2"><?php echo $product['old_price']; ?>$</strike>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a href="?page=show&id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-outline-success">View</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>