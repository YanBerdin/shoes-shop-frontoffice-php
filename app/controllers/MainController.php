<?php

class MainController extends CoreController
{
    // Tester l'appel aux methodes finAll() et findOne() de nos models
    public function test()
    {
        // Etape 5.1 avec Renaud (test)
        $TestObject  = new Product(); // Tester avec Brand ou Category ou Type
        $TestObjects  = $TestObject->findAll();

        $this->show("test");
        // Visu Test
        // dd($TestObjects);
        $TestObjectId5 = $TestObject->findOne(5);

        dd($TestObjects, $TestObjectId5, $TestObjectId5->getName(), $TestObjectId5->getId());
    }

    public function home($params)
    {
        $this->show("home");
    }

    public function legalNotices($params)
    {
        $this->show('legal-notices');
    }


    // Version 2 avant heritage 
    // Commenté => Maintenant c'est CoreModel qui déclare ces Propriétés et Getters/Setters
    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    // public function show($viewName, $viewData = [])
    // {
    //     global $router; // Ca c'est pas l'ideal mais pour l'instant ça fait le café

    //     $absoluteURL = $_SERVER['BASE_URI'] . '/';

    //     require_once __DIR__ . '/../views/header.tpl.php';
    //     require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
    //     require_once __DIR__ . '/../views/footer.tpl.php';
    // }
}


//  -----------------   Version 1 avant connexion à la BDD

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