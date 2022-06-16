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
  
    <section class="py-5" style="background-image: url('https://ecommerce.fm/wp-content/uploads/2020/07/fashion-ecommerce-scaled.jpg'); " >

        <div>
            <div class="d-flex flex-wrap justify-content-center " style="width:100%;">
                <?php foreach ($products as $product) : ?>
                    <div class="m-4">
                        <div class="card h-100" style="width:300px;">
                            <!-- Product image-->
                            <img class="card-img-top"  src="<?php echo BASE_URL; ?>./public/products/<?= $product['product_image'] ?>" />
                            <div class="card-body " style="width:200px;">
                                <h5 class="card-title"><?php echo $product['product_title']; ?></h5>
                                <p class="card-text"><?php echo $product['short_desc']; ?></p>
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