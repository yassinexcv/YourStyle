<?php
    $data = new ProductController();
    $product = $data->getProductById($_GET["id"]);
?>

<div class="container">
        <div class="row">
            <div class="col">
            <img src="https://www.sportpalais.com/catalog/product/adidas/DM7275_GRIS_A.jpg" alt="<?php echo $product['product_title']; ?>" class="card-img-top">
            </div>
            <div class="col">
                <div class="information">
                    <h1><?php echo $product['product_title']; ?></h1>
                    <p><?php echo $product['short_desc']; ?></p>
                    <p><?php echo $product['product_description']; ?></p>
                    <p><?php echo $product['product_price']; ?>$</p>
                    <p><strike><?php echo $product['old_price']; ?>$</strike></p>
                    <a href="?page=home" class="btn btn-outline-secondary">Back</a>
                    
                </div>
            </div>
            <div class="col">
                <div class="bynow">
                    <!-- <button type="submit" name="test" class=" link-dark">
                        
                        <a href="#" onclick="addProduct()" class="link-dark">Ajouter a la cart</a>
                        
                    </button> -->
                    <button onclick="addProduct()">Try</button>
                </div>
            </div>
        </div>
</div>

<script>
    function addProduct()
    {
        let data=JSON.parse('<?php echo json_encode($product); ?>');
        let find=localStorage.getItem('userInfo');
        if(find)
        {
            find=JSON.parse(find);
            
            find.push(data);
            localStorage.setItem('userInfo',JSON.stringify(find));
            
        }else{

            localStorage.setItem('userInfo',JSON.stringify([data]));
        }
        // localStorage.setItem('userInfo','<?php echo json_encode($product); ?>');
    }
</script>