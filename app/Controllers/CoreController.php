<?php
namespace App\Controllers;

// Grace à autoload (PSR-4)
use App\Models\Brand;
use App\Models\Category;
use App\Models\Type;

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
        // accès à des variables dans le contexte global
        // Revient à importer $router depuis index.php à l'intérieur de la méthode show
        global $router;

        $BASE_URI = $_SERVER['BASE_URI'];

        $categoryModel = new Category();
        // Liste  des categories dont le champ 'name' est classé par ordre alphabetique
        $categoriesList = $categoryModel->findAll('name');

        $typeModel = new Type();
        // Liste  des types classées par ordre alphabetique
        $typesList = $typeModel->findAll('name');

        $modelBrand = new Brand();
        // Liste  des marques classées par ordre alphabetique
        $brandsList = $modelBrand->findAll('name');

        $categoriesListById = [];
        foreach ($categoriesList as $categoryElement) {
            $categoriesListById[$categoryElement->getId()] = $categoryElement;
        }

        $typesListById = [];
        foreach ($typesList as $typeElement) {
            $typesListById[$typeElement->getId()] = $typeElement;
        }

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
