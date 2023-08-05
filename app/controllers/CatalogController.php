<?php

require_once __DIR__ . '/CoreController.php';

class CatalogController extends CoreController
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
        //Renaud => $categoryModel->find($id);

        // Récupérer les Data des produits de chaque categorie N°($id)
        // Créer un objet contenant les Data de Class/Model Product
        // Instancier un objet new Product($id)
        $productModel = new Product();
        // objet (Data) de Class/Model Product) => Tous les produits de la categorie demandée
        $products = $productModel->findAllByCategory($params['id']);
        //   idem = $productModel->findAllByCategory($id);

        // Transmettre Data à la view
        $this->show('category', [
            // Maintenant que je recupere depuis CatalogController un Objet $category categoryId est dedans
            // 'categoryId' => $params['id'],
            'category' => $category,
            // objet (ttes les Data) de Class/Model Product)
            'products' => $products
        ]);
    }
    // V1 qui ne fait qu'afficher page statique selon son id
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
        // On récupère les données du type $id en BDD
        $typeModel = new Type();
        $type = $typeModel->findOne($params['id']);
        // dd($type);

        // Interroger le model Product pour récupérer des produits.
        // Créer une methode dans ce model
        $productModel = new Product();
        $products = $productModel->findAllByType($params['id']);

        $this->show("type", [
            'type' => $type,
            'products' => $products
        ]);
    }


    // V1 de function type($params)
    // public function type($params)
    // {
    //     $this->show('type');
    // }

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

        // Interroger le bon model pour récupérer les produits.
        // On va devoir créer une nouvelle methode dans le bon model pour ça.
        $productModel = new Product();
        $products = $productModel->findAllByBrand($params['id']);

        $this->show('brand', [
            // Maintenant que je recupere depuis CatalogController un Objet $product brandId est dedans
            // 'brandId' => $params['id'],
            'brand' => $brand, // A la clé brand on transmet toutes les données dans la requete (objet Brand recup grace à FetchObject)
            'products' => $products
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
        // Récupérer l'id de la categorie à laquelle le produit est associé
        $currentCategoryId = $product->getCategory_id();

        // Récupérer la catégorie à laquelle le produit ci-dessus est associé
        $categoryModel = new Category();
        $curentcategory = $categoryModel->findOne($currentCategoryId);


        $this->show('product', [
            // Maintenant que je recupere depuis CatalogController un Objet $product productId est dedans
            // 'productId' => $params['id'],
            'product' => $product, // A la clé product on transmet toutes les données dans la requete (objet product recup grace à FetchObject)
            'curentcategory' => $curentcategory
        ]);
    }

    // Récupérer Data pour afficher les produits d'une catégorie N°($id)
    // La page categorie pointe vers le CatalogCntroller et sa méthode category()
    // Donc c'est CatalogController et sa méthode catégory() 
    // qui interroge le model Product pour récupérer les data

    // CatalogController ne peut utiliser le Model Product
    // Car le Model Product ne possede pas de méthode 'select FetchAll dans la BDD'
    // Permettant de Retourner tous les produits liés à une catégorie précise
    // Dans le Model Product => Créer une Méthode findAllByCategory($categoryId)




    // Commenté Depuis mise en place de la classe Mere CoreController qui possede show()
    // N'est plus utile ici
    //     /**
    //      * Affiche la page
    //      *
    //      * @param Type $viewName
    //      * @param array $viewData (Facultatif)
    //      */
    //     public function show($viewName, $viewData = [])
    //     {
    //         global $router; // Ca c'est hyper degueulasse mais pour l'instant ça fait le café

    // 1er essai: $baseUri = $_SERVER['BASE_URI'] . '/';

    // Si on veut transmettre aux templates une donnée, on peut le faire ici
    // $url = 'google.com';

    // Objectif : récupérer proprement tous nos assets (style, images, ...)
    // On doit utiliser une URL absolue (plutôt que relative) pour cela
    // On a vu que $_SERVER['BASE_URI'] contenait l'URL dont on a besoin
    //         $absoluteURL = $_SERVER['BASE_URI'];

    //         require_once __DIR__ . '/../views/header.tpl.php';
    //         require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
    //         require_once __DIR__ . '/../views/footer.tpl.php';
    //     }
}
