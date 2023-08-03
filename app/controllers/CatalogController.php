<?php
require_once __DIR__ . "./../models/Brand.php";
require_once __DIR__ . "./../models/Product.php";
// require_once __DIR__ . "./../models/Type.php";
require_once __DIR__ . "./../models/Category.php";

class CatalogController
{
    /**
     * Méthode qui affiche une catégorie ciblée avec son id
     *
     * @param int $params
     */
    public function category($params)
    {
        // Objectif : avoir accès à la catégorie demandée
        // Moyens : le Controller doit demander au Model d'accéder à la BDD pour cela
        // (le Model comporte une méthode dédiée : findOne ou findAll)
        $categoryModel = new Category();
        $category = $categoryModel->findOne($params['id']);

        $this->show('category', [
            'categoryId' => $params['id'],
            'category' => $category
        ]);
    }
    // public function category($params)
    // {
    //     $this->show('category');
    // }


    /**
     * Méthode qui affiche un type ciblé avec son id
     *
     * @param int $params
     */
    public function type($params)
    {
        $this->show('type');
    }

    /**
     * Méthode qui affiche une marque ciblée avec son id
     *params
     * @param int $params
     */
    // public function brand($id)
    // {
    //     $this->show("products_list", ['id' => $id, 'title' => "Marque"]);
    // }
    public function brand($params)
    {
        // V2 : On récupère à présent des paramètres via $params
        // cad l'id de la marque
        // On appelle la méthode findOne() pour récupérer la marque concernée
        $brandModel = new Brand();
        $brand = $brandModel->findOne($params['id']);

        $this->show('brand', [
            'brandId' => $params['id'],
            'brand' => $brand // A la clé brand on transmet toutes les données dans la requete (objet Brand recup grace à FetchObject)
        ]);
    }

    /**
     * Méthode qui affiche un produit ciblé avec son id
     *
     * @param int $params
     */
    public function product($params)
    {
        // V2 : On récupère à présent des paramètres via $params
        // cad l'id de la marque
        // On appelle la méthode findOne() pour récupérer la marque concernée
        $productModel = new Product();
        $product = $productModel->findOne($params['id']);

        $this->show('product', [
            'productId' => $params['id'],
            'product' => $product // A la clé product on transmet toutes les données dans la requete (objet Brand recup grace à FetchObject)
        ]);
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

        // 1er essai: $baseUri = $_SERVER['BASE_URI'] . '/';

        // Si on veut transmettre aux templates une donnée, on peut le faire ici
        // $url = 'google.com';

        // Objectif : récupérer proprement tous nos assets (style, images, ...)
        // On doit utiliser une URL absolue (plutôt que relative) pour cela
        // On a vu que $_SERVER['BASE_URI'] contenait l'URL dont on a besoin
        $absoluteURL = $_SERVER['BASE_URI'];

        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}
