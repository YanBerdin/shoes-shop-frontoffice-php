<?php

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

        // Objectif : récupérer toutes les marques/categories/types
        // et dynamiser les liens du menu 
        // CoreController va passer à tous les templates ces listes (Grace à l'heritage)

        $categoryModel = new Category();
        $categoriesList = $categoryModel->findAll('name');

        $typeModel = new Type();
        $typesList = $typeModel->findAll('name');

        $modelBrand = new Brand();
        $brandsList = $modelBrand->findAll('name');

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}
