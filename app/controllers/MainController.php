<?php


class MainController
{
    public function home()
    {
        $this->show("home");
    }

    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    public function show($viewName, $viewData = [])
    {
        $baseUri = $_SERVER['BASE_URI'] . '/';

        require_once __DIR__ . "/../views/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/footer.tpl.php";
    }
}

// ANCIENNE VERSION

// class MainController
// {
//     public function home()
//     {
//         $this->show("home");
//     }

//     /**
//      * Affiche la page
//      *
//      * @param string $viewName
//      * @param array $viewData (Facultatif)
//      */
//     public function show($viewName, $viewData = [])
//     {
//         require_once __DIR__ . "/../views/header.tpl.php";
//         require_once __DIR__ . "/../views/$viewName.tpl.php";
//         require_once __DIR__ . "/../views/footer.tpl.php";
//     }
// }