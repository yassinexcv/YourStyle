<?php
$data = new ProductController();
$product = $data->getProductById($_GET["id"]);

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
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./public/css/styles.csss" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo BASE_URL; ?>./public/products/<?= $product['product_image'] ?>" alt="<?php echo $product['product_title']; ?>" /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?php echo $product['product_title']; ?></h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through"><?php echo $product['product_price']; ?>$</span>
                        <p><strike><?php echo $product['old_price']; ?>$</strike></p>
                    </div>
                    <h1 class="lead"><?php echo $product['short_desc']; ?></h1>
                    <p class="lead"><?php echo $product['product_description']; ?></p>
                    <div class="d-flex">
                        <div class="bynow">
                            <button class="btn btn-success" onclick="addProduct()">ajouter</button>
                        </div>
                        <div class="cart px-4 px-lg-3  ">
                            <a class="btn btn-primary" href="cart" role="button">Cart</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Related items section-->
    
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <!-- <input type="text" hidden value=""> -->
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php for ($i = 0; $i < 4 ; $i++) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo BASE_URL; ?>./public/products/<?= $products[$i]['product_image'] ?>" alt="<?php echo $products[$i]['product_title']; ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $products[$i]['product_title']; ?></h5>
                                <p class="card-text"><?php echo $products[$i]['product_description']; ?></p>
                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">Fancy Product</h5>
                                        <p class="text-muted">$<?php echo $products[$i]['product_price']; ?></p>
                                        <strike class="badge badge-dark p-2"><?php echo $products[$i]['old_price']; ?>$</strike>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a href="?page=show&id=<?php echo $products[$i]['product_id']; ?>" class="btn btn-sm btn-outline-success">View</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endfor; ?>
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


<script>
    function addProduct() {
        let data = JSON.parse('<?php echo json_encode($product); ?>');
        let find = localStorage.getItem('userInfo<?php if (isset($_SESSION["user_id"])) echo $_SESSION["user_id"] ?>');
        if (find) {
            find = JSON.parse(find);
            find.push(data);
            localStorage.setItem('userInfo<?php if (isset($_SESSION["user_id"])) echo $_SESSION["user_id"] ?>', JSON.stringify(find)); // add product to cart
            Swal.fire(
                'Felicitation!',
                'Ton produit est ajouté a votre panier !',
                'Bravo !'
            )
        } else {
            localStorage.setItem('userInfo<?php if (isset($_SESSION["user_id"])) echo $_SESSION["user_id"] ?>', JSON.stringify([data]));
        }
    }

</script>
