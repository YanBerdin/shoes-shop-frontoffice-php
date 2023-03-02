<?php


// Chargement des dépendances via autoload.php de composer
require_once __DIR__ . '/../vendor/autoload.php';

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

$router = new AltoRouter();

// On spéficie d'où on part pour nos routes
// $_SERVER est une variable spéciale qui contient tout un tas d'informations.
// Attention, entre 2 machines on ne trouvera pas toujours les mêmes clés dans le tableau.
$router->setBasePath($_SERVER['BASE_URI']);
// Identique à
// $router->setBasePath("/Formation/Socle-PHP/Radium/S05/S05-projet-oShop-Raginwald/public");

// La méthode map sur l'objet issu de la classe Altorouter permet de définir
// nos routes et les informations éventuelles à transmettre
$router->map(
    "GET", // La méthode HTTP autorisée pour cette route
    "/",   // Partie de l'URL qui correspond à la page demandée (route)
    [
        'controller' => 'MainController',
        'method' => 'home',
    ],     // Cible le bon controller et la bonne methode
    'home' // Identifiant unique de la route
);

$router->map(
    "GET",
    "/category/[i:id]",
    [
        'controller' => 'CatalogController',
        'method' => 'category',
    ],
    'category'
);

// En gros $router->match() nous indique sur quelle route on est SI elle a été
// définie dans le map().
// Si elle existe, $match (ici) prendra le contenu de la route définie
// SINON elle retourne false.
$match = $router->match();
// dd($match);

if ($match) {
    $controller = new $match['target']['controller']();
    $method = $match['target']['method'];

    $id = $match['params']['id'] ?? null;

    // $id = isset($match['params']['id']) ? $match['params']['id'] : null;

    // if (isset($match['params']['id'])) {
    //     $id = $match['params']['id'];
    // } else {
    //     $id = null;
    // }

    // Le dispatcher
    if ($id) {
        $controller->$method($id);
    } else {
        $controller->$method();
    }
} else {
    $controller = new ErrorController();
    $controller->error404();
}
//===============================================================================

// ANCIENNE VERSION AVANT INSTALLATION COMPOSER.JSON

// $routes = [
//     '/' => [
//         'controller' => 'MainController',
//         'method' => 'home',
//     ],
//     '/category' => [
//         'controller' => 'CatalogController',
//         'method' => 'category',
//     ],
// ];



// partie deja commentée
//
// if (isset($_GET['_url'])) {
//     $currentPage = $_GET['_url'];
// } else {
//     $currentPage = '/';
// }
// FIN PARTIE DEJA COMMENTEE


// ANCIENNE VERSION AVANT INSTALLATION COMPOSER.JSON
// $currentPage = $_GET['_url'] ?? '/';

// if (isset($routes[$currentPage])) {
//     $controller = new $routes[$currentPage]['controller']();
//     $method = $routes[$currentPage]['method'];

//     // Le dispatcher
//     $controller->$method();
// } else {
//     $controller = new ErrorController();
//     $controller->error404();
// }



