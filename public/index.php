<?php
// 0. On doit récupérer les dépendances pour les rendre accessibles dans le projet
// On doit require le fichier autoload.php (autochargement des dependances) pour cela
// Chargement des dépendances via autoload.php de composer
require_once __DIR__ . '/../vendor/autoload.php';

// On inclut les dépendances, cad le(s) controllers
/*
    - Inclure nos controller
    - Faire un tableau qui contient les routes possibles
    - Récupérer la page demandée dans l'url avec $_GET
    - Faire un if else qui vérifie si la route demandée existe :
        - Soit on appel la bonne méthode du bon controller correspondant à notre route
        - Soit on affiche la page d'erreur 404
 */

require_once __DIR__ . "/../app/controllers/ErrorController.php";
require_once __DIR__ . "/../app/controllers/MainController.php";
require_once __DIR__ . "/../app/controllers/CatalogController.php";

require_once __DIR__ . "/../app/utils/Database.php";
require_once __DIR__ . "/../app/models/Product.php";
require_once __DIR__ . "/../app/models/Brand.php";

// On utilise AltoRouter
// 1. On créé une nouvelle instance de la classe AltoRouter
// (Pas besoin require car installé comme dependance avec Composer)
$router = new AltoRouter();

// 2. On doit dire à AltoRouter la partie de l'URL à ne pas prendre en compte pour le mapping
// Pour cela, on va utiliser une variable fournie par le .htaccess
// var_dump($_SERVER);
// $_SERVER['BASE_URI'] contient la partie de l'URL à ne pas prendre en compte

// On spéficie d'où on part pour nos routes
// $_SERVER est une variable spéciale qui contient tout un tas d'informations.
// Attention, entre 2 machines on ne trouvera pas toujours les mêmes clés dans le tableau.
// Définition du basepath (partie fixe de l'url)
$router->setBasePath($_SERVER['BASE_URI']);
// dd($_SERVER['BASE_URI']);



// 3. On fait le "mapping" cad la correspondance entre URL demandée et route associée
// map() prend 4 paramètres :
// - la méthode HTTP
// - la route
// - la cible
// - le nom de la route (facultatif)
// http://altorouter.com/usage/mapping-routes.html

// La méthode map sur l'objet issu de la classe Altorouter permet de définir
// nos routes et les informations éventuelles à transmettre
// Route pour la home
$router->map(
    'GET', // La méthode HTTP autorisée pour cette route
    '/',   // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => 'MainController', // Cible le bon controller et la bonne methode
        'method' => 'home',
    ],
    'home' // Identifiant unique de la route
);

// Route pour les mentions légales
$router->map(
    "GET",
    '/mentions-legales/', // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => 'MainController',
        'method' => 'legalNotices',
    ],
    'legal-notices'
);

// Route pour les catégories du catalogue produit
$router->map(
    "GET",
    '/catalogue/categorie/[i:id]/',
    [
        'controller' => 'CatalogController',
        'method' => 'category',
    ],
    'catalog-category'
);

// Route pour les types
$router->map(
    "GET",
    '/catalogue/type/[i:id]/',
    [
        'controller' => 'CatalogController',
        'method' => 'type',
    ],
    'catalog-type'
);

// Route pour les marques
$router->map(
    'GET',
    '/catalogue/marque/[i:id]/',
    [
        'controller' => 'CatalogController',
        'method' => 'brand'
    ],
    'catalog-brand'
);

// Route pour les produits
$router->map(
    'GET',
    '/catalogue/produit/[i:id]/',
    [
        'controller' => 'CatalogController',
        'method' => 'product'
    ],
    'catalog-product'
);

// Route pour les produits
// $router->map(
//     'GET',
//     '/produit/[i:id]',
//     [
//         'controller' => 'CatalogController',
//         'method' => 'product',
//     ],
//     'product' // catalog-product
// );

// Route test
$router->map(
    'GET',
    '/test/',
    [
        'controller' => 'MainController',
        'method'     => 'test'
    ],
    'test'
);
// Gerard
// Dispatcher
// On utilise la méthode match() d'AltoRouter
// var_dump($match);
// V3 : On récupère le paramètre (id) via $match['params']

// Si $match contient une cible (target) ca signifie que l'URL demandée a bien une route correspondante
// Sinon, $match retourne "false"
// Si on a quelque chose dans $match, alors on peut faire la suite du traitement
$match = $router->match();
// var_dump($match);
//  dd($match);

// Si on a quelque chose dans $match, alors on peut faire la suite du traitement
if ($match) {   // équivalent à $match != false
    $controllerToUse = $match['target']['controller'];

    // On doit récupérer la méthode à appeler
    $methodToUse = $match['target']['method'];

    // On instancie le controller
    $controller = new $controllerToUse();

    // On appelle la méthode
    // $controller->$methodToUse();
    // V3 : on appelle à présent la méthode en lui transmettant l'argument $match['params']
    $controller->$methodToUse($match['params']);


    // $id = isset($match['params']['id']) ? $match['params']['id'] : null;

    // if (isset($match['params']['id'])) {
    //     $id = $match['params']['id'];
    // } else {
    //     $id = null;
    // }

    // Le dispatcher
    // 0 === null -> non
    //donc : 0 !== null -> oui
    // if ($id !== null) {
    //     $controller->$method($id);
    // } else {
    //     $controller->$method();
    // }
} else {
    $controller = new ErrorController();
    $controller->error404();
}
