<?php
$data = new ProductController();
$products = $data->getAllProducts();
$categories = new CategoriesController();
$categories = $categories->getAllCategories();

?>
<div class="container">
    <div class="row my-5">
         <div class="col-md-8">
           
             <div class="row">
                 <?php foreach($products as $product): ?>
                 <div class="col-md-6">
                     <div class="card mb-4 shadow-sm">
                         <img src="https://www.sportpalais.com/catalog/product/adidas/DM7275_GRIS_A.jpg" alt="<?php echo $product['product_title']; ?>" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title"><?php echo $product['product_title']; ?></h5> 
                             <p class="card-text"><?php echo $product['short_desc']; ?></p>
                             <div class="d-flex justify-content-between align-items-center">
                                 <div class="btn-group">
                                     <a href="?page=show&id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-outline-success">View</a>
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
         <div class="col-md-4">
             <div class="text-secondary m-3 text-center">
                    <h3>Categories</h3>
                    <ul class="list-group">
                        <?php foreach($categories as $category): ?>
                        <li class="list-group-item text-center">
                         <a href="?page=category&id=<?php echo $category['cat_id']; ?>" class="btn btn-link text-secondary" style="text-decoration:none;font-size:24px;cursor:pointer"><?php echo $category['cat_title']; ?>

                          (<?php
                                $productsBycat = new ProductController();
                                $productsBycat = $productsBycat->getProductsByCategory($category['cat_id']);
                                echo count($productsBycat);

                            ?>)
                        
                        </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
             </div>
         </div>
    </div>

</div>