<section class="hero">
    <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="<?php // echo $router->generate('home') ?>">Home</a></li>
        </ol>

        <div class="hero-content pb-5 text-center">
            <h1 class="hero-heading">PAGE DE TEST</h1>
        </div>

        <?php // $allProductsByTypeId = $viewData['products']; 
        ?>


        <?php
        // Recuperer le $viewData[] depuis MainController
        // var_dump($viewData) 
        ?>

        <?php
        // Récupérer Test avec tous les produits
        $TestObjects = $viewData['TestObjects'];
        // var_dump($TestObjects) 
        ?>

        <?php
        // Récupérer Test avec le produit id(5)
        $TestObjectId5 = $viewData['TestObjectId5']; ?>
        <?php // var_dump($TestObjectId5) 
        ?>
        <?php // var_dump(
            // $TestObjectId5->getName(),
            // $TestObjectId5->getId(),
           // $TestObjectId5 );
        ?>

    </div>
</section>