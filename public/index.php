<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\MainController;
use App\Controllers\CatalogController;
use App\Controllers\ErrorController;

$router = new AltoRouter();

// Variable fournie par .htaccess
// $_SERVER['BASE_URI'] contient la partie de l'URL à ne pas prendre en compte
// Rappel : entre 2 machines on ne trouvera pas toujours les mêmes clés dans le tableau.
// Définition du basepath (partie fixe de l'url) pour le router
if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    $_SERVER['BASE_URI'] = '/';
}

// 3. On fait le "mapping" cad la correspondance entre URL demandée et route associée
// map() prend 4 paramètres :
// - la méthode HTTP
// - la route
// - la cible
// - le nom de la route (facultatif)
// http://altorouter.com/usage/mapping-routes.html

// La méthode map sur l'objet issu de la classe Altorouter permet de définir
// nos routes et les informations éventuelles à transmettre
$router->map(
    'GET', // La méthode HTTP autorisée pour cette route
    '/',   // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => MainController::class, // Cible le bon controller et la bonne methode
        'method' => 'home',
    ],
    'home' // Identifiant unique de la route
);

// Route pour les mentions légales
$router->map(
    "GET",
    '/mentions-legales', // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => MainController::class,
        'method' => 'legalNotices',
    ],
    'legal-notices'
);

// Route pour les catégories du catalogue produit
$router->map(
    "GET",
    '/catalogue/categorie/[i:id]',
    [
        'controller' => CatalogController::class,
        'method' => 'category',
    ],
    'catalog-category'
);

// Route pour les types
$router->map(
    "GET",
    '/catalogue/type/[i:id]',
    [
        'controller' => CatalogController::class,
        'method' => 'type',
    ],
    'catalog-type'
);

// Route pour les marques
$router->map(
    'GET',
    '/catalogue/marque/[i:id]',
    [
        'controller' => CatalogController::class,
        'method' => 'brand'
    ],
    'catalog-brand'
);

// Route pour les produits
$router->map(
    'GET',
    '/catalogue/produit/[i:id]',
    [
        'controller' => CatalogController::class,
        'method' => 'product'
    ],
    'product'
);

// Route test
$router->map(
    'GET',
    '/test',
    [
        'controller' => MainController::class,
        'method'     => 'test'
    ],
    'test'
);

// Dispatcher
// méthode match() d'AltoRouter compare l'URL demandée avec les routes définies
$match = $router->match();
// var_dump($match);
//  dd($match);
if ($match) {   // équivalent à $match != false
    $controllerToUse = new $match['target']['controller']();

    // Récupérer la méthode à appeler
    $methodToUse = $match['target']['method'];

    // Récupérer les paramètres de la route
    $id = $match['params']['id'] ?? null;

    // Le dispatcher
    // 0 === null -> non
    // donc : 0 !== null -> oui
    if ($id !== null) {
        $controllerToUse->$methodToUse($id);
    } else {
        $controllerToUse->$methodToUse();
    }
} else {
    $controller = new ErrorController();
    $controller->error404();
}
