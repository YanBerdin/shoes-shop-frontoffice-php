<?php

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

$routes = [
    '/' => [
        'controller' => 'MainController',
        'method' => 'home',
    ],
    '/category' => [
        'controller' => 'CatalogController',
        'method' => 'category',
    ],
];

// if (isset($_GET['_url'])) {
//     $currentPage = $_GET['_url'];
// } else {
//     $currentPage = '/';
// }

$currentPage = $_GET['_url'] ?? '/';

if (isset($routes[$currentPage])) {
    $controller = new $routes[$currentPage]['controller']();
    $method = $routes[$currentPage]['method'];

    // Le dispatcher
    $controller->$method();
} else {
    $controller = new ErrorController();
    $controller->error404();
}
