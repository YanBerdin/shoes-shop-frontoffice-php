<?php

// Rappel : Controller interroge Model -> récupère Data -> transmet Data à Template

// Grace à autoload (PSR-4) => Utilisqr "use"
// require_once __DIR__ . './../models/Brand.php';
// require_once __DIR__ . './../models/Category.php';
// require_once __DIR__ . './../models/Type.php';
// require_once __DIR__ . './../models/Product.php';

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;
// use App\Models\Product;

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
        // On accède à des variables dans le contexte global (déclarées en dehors de toute fonction) via le mot-clé global
        // Cela revient à importer $router depuis index.php à l'intérieur de la méthode show
        global $router;

        // Si on veut transmettre aux templates une donnée, on peut le faire ici
        // $url = 'google.com';

        // Objectif : récupérer proprement tous nos assets (style, images, ...)
        // On doit utiliser une URL absolue (plutôt que relative) pour cela
        // On a vu que $_SERVER['BASE_URI'] contenait l'URL dont on a besoin
        $BASE_URI = $_SERVER['BASE_URI'];

        // Objectif : récupérer toutes les marques/categories/types
        // et dynamiser les liens du menu 
        // CoreController globaliser ces données 
        // => va passer à tous les templates ces listes (Grace à l'heritage)

        $categoryModel = new Category();
        // Liste  des categories dont le champ 'name' est classé par ordre alphabetique
        $categoriesList = $categoryModel->findAll('name');

        $typeModel = new Type();
        // Liste  des types classées par ordre alphabetique
        $typesList = $typeModel->findAll('name');

        $modelBrand = new Brand();
        // Liste  des marques classées par ordre alphabetique
        $brandsList = $modelBrand->findAll('name');

        // On va bidouiller la liste des types pour que le tableau devienne un
        // tableau associatif indéxé par les ids.
        $categoriesListById = [];
        foreach ($categoriesList as $categoryElement) {
            $categoriesListById[$categoryElement->getId()] = $categoryElement;
        }

        // On va bidouiller la liste des types pour que le tableau devienne un
        // tableau associatif indéxé par les ids.
        $typesListById = [];
        foreach ($typesList as $typeElement) {
            $typesListById[$typeElement->getId()] = $typeElement;
        }

        // On va bidouiller la liste des types pour que le tableau devienne un
        // tableau associatif indéxé par les ids.
        $brandsListById = [];
        foreach ($brandsList as $brandElement) {
            $brandsListById[$brandElement->getId()] = $brandElement;
        }

        extract($viewData);

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}
