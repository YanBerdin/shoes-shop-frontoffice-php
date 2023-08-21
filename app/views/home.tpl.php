<?php // var_dump($absoluteURL); 
?>

<?php // var_dump($viewData); ?>
<?php $homeCategories = $viewData['homeCategories']; ?>


<section>
    <div class="container-fluid">
        <div class="row mx-0">

            <?php for ($i = 0; $i <= 1; $i++) : ?>

                <div class="col-md-6">
                    <div class="card border-0 text-white text-center"><img src="<?= $homeCategories[$i]->getPicture() ?>" alt="Card image" class="card-img">
                        <div class="card-img-overlay d-flex align-items-center">
                            <div class="w-100 py-3">
                                <h2 class="display-3 font-weight-bold mb-4"><?= $homeCategories[$i]->getName() ?></h2><a href="products_list.html" class="btn btn-light"><?= $homeCategories[$i]->getSubtitle() ?></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endfor ?>



            <div class="row mx-0">

                <?php for ($i = 2; $i <= 4; $i++) : ?>

                    <div class="col-lg-4">
                        <div class="card border-0 text-center text-white"><img src="<?= $homeCategories[$i]->getPicture() ?>" alt="Card image" class="card-img">
                            <div class="card-img-overlay d-flex align-items-center">
                                <div class="w-100">
                                    <h2 class="display-4 mb-4"><?= $homeCategories[$i]->getName() ?></h2><a href="products_list.html" class="btn btn-link text-white"><?= $homeCategories[$i]->getSubtitle() ?>
                                        <i class="fa-arrow-right fa ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endfor; ?>


                <!-- <div class="col-lg-4">
                <div class="card border-0 text-center text-dark">
                    <img src="<?= $absoluteURL ?>/assets/images/categ1.jpeg" alt="Card image" class="card-img">
                    <div class="card-img-overlay d-flex align-items-center">
                        <div class="w-100">
                            <h2 class="display-4 mb-4">Détente</h2>
                            <a href="products_list.html" class="btn btn-link text-dark">Se faire plaisir
                                <i class="fa-arrow-right fa ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 text-center text-white"><img src="<?= $absoluteURL ?>/assets/images/categ3.jpeg" alt="Card image" class="card-img">
                    <div class="card-img-overlay d-flex align-items-center">
                        <div class="w-100">
                            <h2 class="display-4 mb-4">Cérémonie</h2><a href="products_list.html" class="btn btn-link text-white">Bien choisir <i class="fa-arrow-right fa ml-2"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->

                <!-- </div> -->
                <!-- </div> -->
</section>