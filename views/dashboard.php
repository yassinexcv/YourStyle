<?php
$data = new ProductController();
$products = $data->getAllProducts();
$categories = new CategoriesController();
$categories = $categories->getAllCategories();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@webpixels/css@1.1/dist/index.css">
    <title>Dashboard</title>
</head>

<body style="overflow-x:hidden; ">

    <!------ Include the above in your HEAD tag ---------->


    <div class="d-flex flex-column  flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical" style="z-index: 99;">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
               
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php BASE_URL ?>addProduct">
                                <i class="bi bi-box-seam"></i> Produit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bookmark-plus"></i> Category
                                
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php BASE_URL ?>Users">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="flex justify-content-center align-items-center row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 ">
                    <?php foreach ($products as $product) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img  class="card-img-top h-80 w-30" src="<?php echo BASE_URL; ?>./public/products/<?= $product['product_image']  ?>"   alt="<?php echo $product['product_title']; ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['product_title']; ?></h5>
                                <p class="card-text h-20 "><?php echo $product['short_desc']; ?></p>
                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">Fancy Product</h5>
                                        <p class="text-muted">$<?php echo $product['product_price']; ?></p>
                                        <strike class="badge badge-dark p-2"><?php echo $product['old_price']; ?>$</strike>
                                    </div>
                                    <div class=" d-flex justify-content-around btn p-4 "> 
                                        <form action="EditProduct" method="post">
                                            <input type="hidden" value="<?php echo $product['product_id']; ?>" name="id">
                                            <button class="btn btn-primary mx-2 px-4 col-md-12 "  > <i class="bi bi-pencil-square"></i> </button>
                                        </form>
                                        <form action="deleteProduct" method="post">
                                            <input type="hidden" value="<?php echo $product['product_id']; ?>" name="id">
                                            <button class="btn btn-danger mx-2 px-4 col-md-12 " name="delete" > <i class="bi bi-trash"></i> </button>
                                        </form>

                                        <!-- <a href="<?php echo BASE_URL; ?>/admin/delete/<?php echo $product['product_id']; ?>" class="btn btn-danger px-4 col-md-12 " > <i class="bi bi-trash"></i> </a> -->
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a href="<?= BASE_URL ?>?page=show&id=<?php echo $product['product_id']; ?>" class="btn btn-sm btn-outline-success">View</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

    </section>
   </div>





</body>

</html>