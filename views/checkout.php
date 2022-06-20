<?php
$user = new UsersController();
$id = $_SESSION['user_id'];
$user = $user->getUserById($id);

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    Session::set("error","il faut être connecté pour accéder à cette page");
    header("Location: " . BASE_URL."login");
    
   }

?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@webpixels/css@1.1/dist/index.css">


<div class="container">

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Ton panier</span>
                <span class="badge badge-secondary badge-pill" id="num_cart">0</span>
            </h4>
            <ul class="list-group mb-3 products_inner">
                  
            </ul>

            <div class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong id="total">$0</strong>
            </div>
        </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Information de livraison </h4>
        <form class="needs-validation" id="livraison">

            <div class="mb-3">
                <label for="username">Ton nom</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@ <?= $user->username ?></span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email <span class="text-muted"></span></label>
                <span class="input-group-text"><?= $user->email ?></span>

            </div>

            <div class="mb-3">
                <label for="address">Address de facturation et de livraison </label>
                <span class="input-group-text"><?= $user->adress_facture ?></span>

            </div>
            
            <div class="mb-3">
                <label for="phone">Numero de telephone</label>
                <span class="input-group-text"><?= $user->numero_tele ?></span>
            </div>    
            <h4 class="mb-3">Payment à la livaraison </h4>
            <!-- <a href="<?php BASE_URL ?>CommandeStatut" class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</a> -->
            <button type="submit" class="btn btn-primary btn-lg btn-block">Continue to checkout</button>
        </form>

    </div>

</div>




<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">Copyright crée par Yassine Touti</p>
   
</footer>

</div>

<script>
    const cart = JSON.parse(localStorage.getItem('userInfo<?php if(isset($_SESSION["user_id"]))echo $_SESSION["user_id"]?>'));
    
    if(cart){
        
        document.getElementById('num_cart').innerText = cart.length;
        let total = 0;
        for(let i = 0; i < cart.length; i++){
            total += Number(cart[i].product_price);
        }
        
        document.getElementById('total').innerText = total+'$';
        let html = '';
                // console.log(cart);return;
                cart.forEach(function(item) {
                    html += `
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">${item.product_title}</h6>
                        <small class="text-muted">${item.short_desc}</small>
                    </div>
                    <span class="text-muted">${item.product_price}</span>
                </li>
                    `;
                });

                document.querySelector('.products_inner').innerHTML = html;

    }

    document.getElementById('livraison').addEventListener('submit', function(e){
        e.preventDefault();
        let data = {
            email: '<?= $user->email ?>',
            address:'<?= $user->adress_facture ?>',
            phone:'<?= $user->numero_tele ?>',
            cart: cart
        };
       
        
        localStorage.removeItem('userInfo<?php if(isset($_SESSION["user_id"]))echo $_SESSION["user_id"]?>');
        localStorage.setItem('infoOrder<?php if(isset($_SESSION["user_id"]))echo $_SESSION["user_id"]?>', JSON.stringify(data));
        window.location.href = '<?php echo BASE_URL ?>CommandeStatut';
    });
    
</script>