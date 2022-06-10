<?php
$data = new ProductController();
$products = $data->getAllProducts();
$categories = new CategoriesController();
$categories = $categories->getAllCategories();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Your Style </title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./public/css/styles.css" rel="stylesheet" />
</head>

<body>
  
    <!-- Section-->
    <section class="py-5">
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
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>