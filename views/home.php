<?php
$data = new ProductController();
$products = $data->getAllProducts();
?>


<div class="container">
    <div class="row my-5">
        <div class="col-md-8">
            <div class="row">
                <?php
                   if(count($products) > 0) :
                ?>
                <?php 
                foreach($products as $product) :
                 ?>
                 <div class="card h-100 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['product_title']; ?></h5>
                        <p class="card-text"><?php echo $product['product_description']; ?></p>
                        <p class="card-text">$<?php echo $product['product_price']; ?></p>
                        <a href="product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Product</a>
                    </div>
                 </div>
                <?php
                        endforeach;
                ?>
                <?php 
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>