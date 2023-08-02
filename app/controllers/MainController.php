<?php
require_once __DIR__ . './../models/Brand.php';
require_once __DIR__ . "./../models/Product.php";

class MainController
{
    public function test() // Etape 5.1 avec Renaud (test)
    {
        $product = new Product();
        $products = $product->findAll();

        $this->show("test");
        // Visu Test
         dd($products);
    }

    public function home($params)
    {
        $this->show("home");
    }

    public function legalNotices($params)
    {
        $this->show('legal-notices');
    }

    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    public function show($viewName, $viewData = [])
    {
         global $router; // Ca c'est hyper degueulasse mais pour l'instant ça fait le café

        $absoluteURL = $_SERVER['BASE_URI'] . '/';

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}

// VErsion avant connexion à la BDD


// class MainController
// {
//     public function home()
//     {
//         $this->show("home");
//     }

//     public function legalNotice()
//     {
//         $this->show("legal_notice");
//     }

//     /**
//      * Affiche la page
//      *
//      * @param string $viewName
//      * @param array $viewData (Facultatif)
//      */
//     public function show($viewName, $viewData = [])
//     {
//         global $router; // Ca c'est hyper degueulasse mais pour l'instant ça fait le café

//         $baseUri = $_SERVER['BASE_URI'] . '/';

//         require_once __DIR__ . "/../views/header.tpl.php";
//         require_once __DIR__ . "/../views/$viewName.tpl.php";
//         require_once __DIR__ . "/../views/footer.tpl.php";
//     }
// }