<?php

/**
 * Récupère l'objet $type transmis via $viewData par CatalogController.
 *
 * @var Type 
 */
$type = $viewData['type'];

/**
 * Récupère l'objet $products transmis via $viewData par CatalogController.
 *
 * @var Product 
 */
$products = $viewData['products'];
?>

<section class="hero">
  <!-- Hero Content-->
  <div class="hero-content pb-5 text-center">
    <h2 class="hero-heading"><?= $type->getName() ?></h2>
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
      <?php foreach ($products as $product) : ?>
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <!-- <a href="#" class="product-hover-overlay-link"> -->
            <img src="<?= $product->getPicture() ?>" alt="product" class="img-fluid">
            <!-- </a> -->
          </div>
          <div class="product-action-buttons">
            <!-- Bouton shopping-cart désactivé -->
            <a href="<?= $router->generate('home') ?>" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
            <a href="<?= $router->generate('product', ["id" => $product->getId()]) ?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1">Chausson</p>
            <h3 class="h6 text-uppercase mb-1"><a href="<?= $router->generate('product', ["id" => $product->getId()]) ?>" class="text-dark"><?= $product->getName() ?></a></h3><span class="text-muted"><?= $product->getPrice() ?>€</span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>