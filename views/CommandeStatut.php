


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center;">
                        Statut de Votre Commande
                    </h2>
                    <div class="shopping_cart">
                        <form class="form-horizontal" role="form" action="" method="post" id="payment-form">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <div>
                                                Review Your Order
                                            </div>

                                        </h4>
                                    </div>
                                    <div id="shopping_cart">
                                        <div class="panel-body">
                                            <div class="items">
                                                <div class="col-md-9">
                                                    <table class="table table-striped">

                                                        <tr>
                                                            <td>
                                                                <ul id="products">
                                                                   
                                                                </ul>
                                                            </td>
                                                           
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-3">
                                                    <div style="text-align: center;">
                                                        <h3>Order Total</h3>
                                                        <h3><span style="color:green;" id="total" >$147.00</span></h3>
                                                    </div>
                                                    <div>
                                                        <h3>Statut</h3>
                                                        <h3><span style="color:green;" >En cour de validation </span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const data = JSON.parse(localStorage.getItem('infoOrder<?php if (isset($_SESSION["user_id"])) echo $_SESSION["user_id"] ?>'));
    const cart = data.cart;
    if (cart) {

        // document.getElementById('shopping_cart').innerText = cart.length;
        let total = 0;
        for (let i = 0; i < cart.length; i++) {
            total += Number(cart[i].product_price);
        }

        document.getElementById('total').innerText = total + '$';
        let html = '';
        // console.log(cart);return;
        cart.forEach(function(item) {
            html += `
                
            <li>${item.product_title}</li>
            <img src="<?= BASE_URL ?>/public/products/${item.product_image}" class="img-responsive">                                         
          `;
        });

        document.querySelector('#products').innerHTML = html;

    }
</script>