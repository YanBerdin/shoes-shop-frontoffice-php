<?php
// var_dump($absoluteURL);
// var_dump($viewData);
// dump($viewData);

// Recuperer $product transmis via $viewData par CatalogController
/**
 * @var Product
 */
$product = $viewData['product'];
// dump($product);
// var_dump($product->getName());
// var_dump($product->getCategory_id());

// Récupérer un objet Category de la catégorie du produit sélectionné
// ------------$curentcategory = $viewData['curentcategory'];
// var_dump($curentcategory);
?>


<?php
// Récupérer le chemin "src" de l'image du produit
// Maintenant que les images sont hébergées par BenOclock
// $picture = ($absoluteURL . "/" . $product->getPicture());
// $picture = $product->getPicture();
?>


<section class="products-grid">
    <div class="container-fluid">

        <div class="row">
            <!-- product-->
            <div class="col-lg-6 col-sm-12">
                <div class="product-image">
                    <!-- <a href="detail.html" class="product-hover-overlay-link"> -->

                    <!-- Dynamisé-->
                    <img src="<?= $product->getPicture() ?>" alt=" product" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <!-- ajout moi  -->
                    <h1 class="hero-heading"><?= $product->getName() ?></h1>
                    <!-- <h3 class="h3 text-uppercase mb-1">Produit n°<?php // echo $product->getId() 
                                                                        ?></h3> -->
                    <!-- Grâce à triple jointure sur findOne() et propriétés déclarées subséquentes
                            je peux afficher les noms de marques, type...   -->

                    <div class="text-muted"> Made by : <a href="<?= $router->generate('catalog-brand', ["id" => $product->getBrand_id()]) ?>"><em><?= $product->getBrand_Name() ?></em></a></div>
                    <h4>Catégorie : <a href="<?= $router->generate('catalog-category', ["id" => $product->getCategory_id()]) ?>"><?= $product->getCategory_name() ?></a></h4>

                    
                    <div>

                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
                <div class="my-2">
                    <div class="text-muted"><span class="h4"><?= $product->getPrice() ?>€</span> TTC</div>
                </div>
                <div class="product-action-buttons">
                    <form action="" method="post">
                        <input type="hidden" name="product_id" value="1">
                        <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
                    </form>
                </div>
                <div class="mt-5">
                    <p>
                        <?= $product->getDescription() ?>
                    </p>
                </div>
            </div>
            <!-- /product-->
        </div>

    </div>
</section>