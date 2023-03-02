<?php

class CatalogController
{
    /**
     * Méthode qui affiche une catégorie ciblée avec son id
     *
     * @param int $id
     */
    public function category($id)
    {
        $this->show("products_list");
    }

    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    public function show($viewName, $viewData = [])
    {
        require_once __DIR__ . "/../views/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/footer.tpl.php";
    }
}








// ancienne version

// class CatalogController
// {
//     public function category($id)
//     {
//         $this->show("products_list");
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