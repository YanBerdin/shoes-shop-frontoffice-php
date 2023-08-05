<?php
// var_dump($absoluteURL);
 // var_dump($viewData); 

// Recuperer $product transmis via $viewData par CatalogController
/**
 * @var Product[]
 */
$product = $viewData['product'];
 var_dump($product)
// var_dump($product->getName());
?>

<section class="hero">
    <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="<?= $router->generate('home') ?>">Home</a></li>
            <li class="breadcrumb-item active"> <a href="<?= $absoluteURL ?>/catalogue/categorie/<?= $category->getId() ?>/"><?= $category->getName() ?></a></li>
        </ol>
    </div>
</section>

<section class="products-grid">
    <div class="container-fluid">

        <div class="row">
            <!-- product-->
            <div class="col-lg-6 col-sm-12">
                <div class="product-image">
                    <a href="detail.html" class="product-hover-overlay-link">
                        <img src="<?= $absoluteURL ?>/assets/images/produits/1-kiss.jpg" alt="product" class="img-fluid"> </a>
                        <!-- A remplacer :
                            <img src="<?= $baseUri.$product->getPicture() ?> alt="product" class="img-fluid"> -->

                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="mb-3">
                    <!-- ajout moi  -->
                    <h1 class="hero-heading"><?= $product->getName() ?></h1>
                    <h3 class="h3 text-uppercase mb-1">Produit n°<?= $product->getId() ?></h3>
                    <div class="text-muted">by <em>BOOTstrap</em></div>
                    <div>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
                <div class="my-2">
                    <div class="text-muted"><span class="h4">40 €</span> TTC</div>
                </div>
                <div class="product-action-buttons">
                    <form action="cart.html" method="post">
                        <input type="hidden" name="product_id" value="1">
                        <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
                    </form>
                </div>
                <div class="mt-5">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum, consequuntur vel libero magni tempore rerum eos ipsum assumenda, velit architecto exercitationem animi dicta quis at facilis veritatis ut accusamus ipsa sequi recusandae officia similique tenetur? Nemo, repellat at dolore nobis non reprehenderit iusto, nostrum consectetur unde ab id quo quia eum rem veniam, ratione cum fuga autem odio perspiciatis minus reiciendis recusandae est. Earum praesentium minus quisquam et voluptates facere saepe, non velit tempore obcaecati! Porro esse sint blanditiis nulla in officiis aut dicta ipsum fugit ex enim, ab voluptas maxime culpa? Debitis, sequi minus cum, quos minima tempora eum quas repellat sunt incidunt delectus dolor eaque. Natus fugiat neque facere placeat corporis, commodi cum numquam vel exercitationem temporibus eum?
                    </p>
                </div>
            </div>
            <!-- /product-->
        </div>

    </div>
</section>