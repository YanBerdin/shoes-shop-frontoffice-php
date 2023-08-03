<?php
// require_once __DIR__ . './../Models/Brand.php';
// require_once __DIR__ . './../Models/Category.php';
// require_once __DIR__ . './../Models/Category.php';
class CoreController
{

    /**
     * Affiche la page
     *
     * @param Type $viewName
     * @param array $viewData (Facultatif)
     */
    public function show($viewName, $viewData = [])
    {
        // Si on veut transmettre aux templates une donnée, on peut le faire ici
        // $url = 'google.com';

        // Objectif : récupérer proprement tous nos assets (style, images, ...)
        // On doit utiliser une URL absolue (plutôt que relative) pour cela
        // On a vu que $_SERVER['BASE_URI'] contenait l'URL dont on a besoin
        $absoluteURL = $_SERVER['BASE_URI'];

        // On accède à des variables dans le contexte global (déclarées en dehors de toute fonction) via le mot-clé global
        // Cela revient à importer $router depuis index.php à l'intérieur de la méthode show
        global $router;

        // Ajout pour tester la partie Fonctionnalités (fin journée S05E05)
        // Objectif : récupérer les liens vers les marques (pour les utiliser dans le menu)
        $modelBrand = new Brand();
        $allBrands = $modelBrand->findAll();

        // $modelProduct = new Product();
        // $allProductsByTypeId = $modelProduct->findAllByCategory(2);

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}
