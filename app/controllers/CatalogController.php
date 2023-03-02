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
        $this->show("products_list", ['id' => $id, 'title' => "Catégorie"]);
    }

    /**
     * Méthode qui affiche un type ciblé avec son id
     *
     * @param int $id
     */
    public function type($id)
    {
        $this->show("products_list", ['id' => $id, 'title' => "Type"]);
    }

    /**
     * Méthode qui affiche une marque ciblée avec son id
     *
     * @param int $id
     */
    public function brand($id)
    {
        $this->show("products_list", ['id' => $id, 'title' => "Marque"]);
    }

    /**
     * Méthode qui affiche un produit ciblé avec son id
     *
     * @param int $id
     */
    public function product($id)
    {
        $this->show("product", ['id' => $id]);
    }

    /**
     * Affiche la page
     *
     * @param Type $viewName
     * @param array $viewData (Facultatif)
     */
    public function show($viewName, $viewData = [])
    {
        global $router; // Ca c'est hyper degueulasse mais pour l'instant ça fait le café

        $baseUri = $_SERVER['BASE_URI'] . '/';

        require_once __DIR__ . "/../views/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/footer.tpl.php";
    }
}