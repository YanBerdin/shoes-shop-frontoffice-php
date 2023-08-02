 <!-- <?php var_dump($viewData); ?> -->
<!--var_dump($viewData['brand']);
<?php $brand = $viewData['brand']; ?>
var_dump($brand->getName());-->

  <section class="hero">
    <div class="container">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Détente</li>
      </ol>
      <!-- Hero Content-->
      <div class="hero-content pb-5 text-center">
        <h1 class="hero-heading">Page de la marque : </h1>
        <h2><?= $brand->getName() ?></h2>
  </section>