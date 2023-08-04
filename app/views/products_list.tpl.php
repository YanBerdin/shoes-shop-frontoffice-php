<?php
// Template utilisée par sur Projet Renaud pour afficher une liste de d'objet
// D'un certain Type/ Categorie/Marque
// Moi j'ai opté pour une page par Marque/Categorie/Type

// L'entité Category à un champ subtitle les autres pas
// Pour afficher la liste des produits
?>

<?php
$object = $viewData['object'];

/**
 * @var Product[]
 */
$products = $viewData['products'];
?>

<section class="hero">
    <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active"><?= $object->getName() ?></li>
        </ol>
        <!-- Hero Content-->
        <div class="hero-content pb-5 text-center">
            <h1 class="hero-heading"><?= $object->getName() ?></h1>

            <?php
            // method_exists est une fonction native PHP qui permet de vérifier
            // si une classe ou un objet contient une certaine méthode.
            if (method_exists($object, 'getSubtitle')) {
                ?>
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <p class="lead text-muted">
                            <?= $object->getSubtitle() ?>
                        </p>
                    </div>
                </div>
                <?php
            }
            ?>
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
            <?php
            foreach ($products as $product) {
                ?>
                <div class="product col-xl-3 col-lg-4 col-sm-6">
                    <div class="product-image">
                        <a href="product.html" class="product-hover-overlay-link">
                            <img src="<?= $baseUri.$product->getPicture() ?>" alt="product" class="img-fluid">
                        </a>
                    </div>
                    <div class="product-action-buttons">
                        <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
                        <a href="product.html" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
                    </div>
                    <div class="py-2">
                        <p class="text-muted text-sm mb-1"><?= $typesListById[$product->getTypeId()]->getName() ?></p>
                        <h3 class="h6 text-uppercase mb-1"><a href="product.html" class="text-dark"><?= $product->getName() ?></a></h3><span class="text-muted">40€</span>
                    </div>
                </div>
                <?php
            }
            ?>

        </div>

    </div>
</section>