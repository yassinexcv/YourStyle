<link rel="stylesheet" href="./public/css/cart.css">


<div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="p-2">
                        <h4>Shopping cart</h4>
                        <div class="d-flex flex-row align-items-center pull-right"><span class="mr-1">Sort by:</span><span class="mr-1 font-weight-bold">Price</span><i class="fa fa-angle-down"></i></div>
                    </div>                 
                    <div class="products_inner">
                       
                    </div>
                    
                    <a href="<?php BASE_URL ?>checkout" class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-success btn-block btn-lg ml-2 pay-button"  type="button">Valider</button></a>
                    <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button class="btn btn-danger btn-block btn-lg ml-2 clear-button" type="button" id="clear">vider la cart </button></div>

                </div>
            </div>
        </div>

        <script>
            window.onload = function() {
                const cart = JSON.parse(localStorage.getItem('userInfo<?php if(isset($_SESSION["user_id"]))echo $_SESSION["user_id"]?>'));
                let html = '';
                // console.log(cart);return;
                cart.forEach(function(item) {
                    html += `
                        <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                            <div class="mr-1"><img class="rounded" src="./public/products/${item.product_image}" width="70"></div>
                            <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">${item.product_title}</span>
                                <div class="d-flex flex-row product-desc">
                                ${item.short_desc}
                                </div>
                            </div>
                            <strike class="d-flex flex-row align-items-center qty"><i class="fa fa-minus text-danger"></i>
                                <p class="text-grey mt-1 mr-1 ml-1 text-decoration-line-through">$${item.old_price}</p><i class="fa fa-plus text-success"></i></strike>
                            <div>
                                <h5 class="text-grey">$${item.product_price}</h5>
                            </div>
                            <div class="d-flex align-items-center"><i class="fa fa-trash mb-1 text-danger"></i></div>
                        </div>

                    `;

                });

                document.querySelector('.products_inner').innerHTML = html;

            }
            let clear = document.getElementById('clear');
            clear.addEventListener('click', function() {
                localStorage.removeItem('userInfo<?php if(isset($_SESSION["user_id"]))echo $_SESSION["user_id"]?>');
                window.location.href = 'index.php?page=cart';
            });

        </script>
<?php include './views/includes/footer.php'; ?>