<?php
// var_dump($viewData); 
$brand = $viewData['brand'];
// var_dump($brand->getName()); 
$products = $viewData['products'];
// dump($products);
?>

<section class="hero">
  <div class="container">
    <!-- Hero Content-->
    <div class="hero-content pb-5 text-center">
      <h1 class="hero-heading">Bienvenue dans l'univers de la marque : </br> <?= $brand->getName() ?></h1>
      <div class="row">
        <div class="col-xl-8 offset-xl-2">
        </div>
      </div>
    </div>
  </div>
</section>


<section class="products-grid">
  <div class="container-fluid">

    <header class="product-grid-header d-flex align-items-center justify-content-between">
      <div class="mr-3 mb-3">
        Affichage <strong>1-12 </strong>de <strong>158 </strong>résultats
      </div>
      <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
      </div>
      <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Trier par</span>
        <select class="custom-select w-auto border-0">
          <option value="orderby_0">Défaut</option>
          <option value="orderby_1">Nom</option>
          <option value="orderby_2">Note</option>
          <option value="orderby_3">Prix</option>
        </select>
      </div>
    </header>

    <div class="row">

      <!-- product-->

      <?php
      // Récupérer l'id de la categorie à laquelle 1 produit est associé
      // $currentCategoryId = $product->getCategory_id();

      // Récupérer la catégorie à laquelle 1 produit est associé
      // $categoryModel = new Category();
      //$curentcategory = $categoryModel->findOne($currentCategoryId);

      // var_dump($absoluteURL);  
      // Récupérer le chemin absolu "src" de chaque image
      // $picture = ($absoluteURL . "/" . $product->getPicture());
      // Nouveau chemin à reconstituer avec images hebergées par BenOclock
      foreach ($products as $product) : ?>
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a href="<?= $BASE_URI ?>catalogue/produit/<?= $product->getId() ?>" class="product-hover-overlay-link">
              <img src="<?= $product->getPicture(); ?>" alt=" product" class="img-fluid">
          </div>
          <div class="product-action-buttons">
            <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
            <a href="<?= $router->generate('product', ["id" => $product->getId()]) ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1"><?= $product->getName() ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?= $router->generate('catalog-category', ["id" => $product->getCategory_id()]) ?>"><?= $product->getCategory_name() ?></a></h3><span class="text-muted">20€</span>
          </div>
        </div>

      <?php endforeach; ?>

      <!-- /product-->

      <!-- product-->
      <!-- <div class="product col-xl-3 col-lg-4 col-sm-6">
        <div class="product-image">
          <a href="product.html" class="product-hover-overlay-link">
            <img src="<?php // echo $absoluteURL 
                      ?>/assets/images/produits/3-panda_tn.jpg" alt="product" class="img-fluid">
          </a>
        </div>
        <div class="product-action-buttons">
          <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
          <a href="product.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
        </div>
        <div class="py-2">
          <p class="text-muted text-sm mb-1">Chausson</p>
          <h3 class="h6 text-uppercase mb-1"><a href="product.html" class="text-dark">Panda</a></h3><span class="text-muted">50€</span>
        </div>
      </div> -->
      <!-- /product-->

    </div>

  </div>
</section>