        <?php // var_dump($url); 
        ?>
        <?php // var_dump($absoluteURL) 
        ?>

        <?php // var_dump($typesList);
        ?>

        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- V2 : On utilise la variable $absoluteURL pour avoir des URLs absolues au niveau de nos assets -->
            <!-- $absoluteURL contient : 'localhost/.../public' -->
            <link rel="stylesheet" href="<?= $absoluteURL ?>/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?= $absoluteURL ?>/assets/css/font-awesome.min.css">
            <link rel="stylesheet" href="<?= $absoluteURL ?>/assets/css/styles.css">
            <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/css/styles.css"> -->
            <title>oShop</title>
        </head>

        <body>
            <header>
                <div class="top-bar">
                    <div class="container-fluid">
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-7 d-none d-sm-block">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item pr-3 mr-0">
                                        <i class="fa fa-phone"></i> 01 02 03 04 05
                                    </li>
                                    <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">Livraison offerte à partir de 100€</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <nav class="navbar navbar-expand-lg navbar-sticky navbar-airy navbar-light">
                    <div class="container-fluid">
                        <!-- Navbar Header  -->
                        <!-- La méthode show() a récupéré $router
                        on peut donc utiliser la méthode generate() qui prend en argument le nom de la route et reconstruit automatiquement l'URL correspondante -->
                        <!-- <a href="index.html" class="navbar-brand">oShop</a> -->
                        <a href="<?= $router->generate('home') ?>" class="navbar-brand">oShop</a>
                        <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                        <!-- Navbar Collapse -->
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <!-- <a href="index.html" class="nav-link active">Accueil</a> -->
                                    <a href="<?= $router->generate('home') ?>" class="nav-link active">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="<?= $router->generate('catalog-category') ?>" data-toggle="dropdown">Catégories</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <?php
                                            foreach ($categoriesList as $category) : ?>
                                                <?php // var_dump($category); 
                                                ?>
                                                <!--     Recontruit chemin href           ===>             ==>         /         id             /          Texte du lien    -->
                                                <a class="dropdown-item" href="<?= $absoluteURL ?>/catalogue/categorie/<?= $category->getId() ?>/"><?= $category->getName() ?></a>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="<?= $router->generate('catalog-type') ?>" data-toggle="dropdown">Types de produits</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <?php foreach ($typesList as $type) : ?>
                                                <a class="dropdown-item" href="<?= $absoluteURL ?>/catalogue/type/<?= $type->getId() ?>/"><?= $type->getName() ?></a>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Marques</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                            <?php foreach ($brandsList as $brand) : ?>
                                                <!-- dans ce foreach, $allBrands est un array d'objets -->
                                                <!-- et $brand représente chaque objet Brand -->
                                                <a class="dropdown-item" href="<?php echo $absoluteURL . '/catalogue/marque/' . $brand->getId() . '/'; ?>"><?php echo $brand->getName(); ?></a>
                                            <?php endforeach; ?>

                                            <!-- <a class="dropdown-item" href="products_list.html">BOOTstrap</a>
                                            <a class="dropdown-item" href="products_list.html">O'shoes</a>
                                            <a class="dropdown-item" href="products_list.html">oCirage</a>
                                            <a class="dropdown-item" href="products_list.html">oPompes</a>
                                            <a class="dropdown-item" href="products_list.html">Pattes d'eph</a>
                                            <a class="dropdown-item" href="products_list.html">PHPieds</a> -->
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>