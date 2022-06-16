<?php
$categories = new CategoriesController();
$categories = $categories->getAllCategories();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo BASE_URL;?>">Your Style</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo BASE_URL;?>">Accueil <span class="sr-only"></span></a>
      </li>
     
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          catrgories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 99;">
          <?php foreach($categories as $category):?>
            <a class='dropdown-item' href='<?= BASE_URL ?>?page=category&id=<?php echo $category['cat_id']; ?>'><?=$category["cat_title"]?></a>
          <?php endforeach;?>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo BASE_URL;?>cart"><i class="bi-cart-fill me-1"></i>
          Panier
          <script>
          // afficher le nombre d'article dans le panier
          </script>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true):?>
            <!-- <input type="text" value="<?php echo $_SESSION["username"]?>"> -->
          <a class="dropdown-item" href="<?php echo BASE_URL;?>Profil"><?php echo $_SESSION["fullname"];?></a>
          <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true):?>
           <a class="dropdown-item" href="<?php echo BASE_URL;?>dashboard">dashboard <span class="sr-only"></span></a>
           <?php endif;?> 
           <a class="dropdown-item" href="<?php echo BASE_URL;?>logout">Déconnexion</a>
        <?php else:?>  
          <a class="dropdown-item" href="<?php echo BASE_URL;?>register">Inscription</a>
          <a class="dropdown-item" href="<?php echo BASE_URL;?>login">Connexion</a>
        </div>
        <?php endif;?> 
      </li>
    </ul>
  </div>
  
  </div>
</nav>
