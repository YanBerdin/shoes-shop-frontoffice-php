<?php

class ErrorController extends CoreController
{
    public function error404()
    {
        $this->show("error404");
    }

    // Commenté => Maintenant c'est CoreModel qui déclare show()
    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    // public function show($viewName, $viewData = [])
    // {
    // global $router; // Ca c'est hyper degueulasse mais pour l'instant ça fait le café

    //     $baseUrl = $_SERVER['BASE_URI'] . '/';

    //     require_once __DIR__ . '/../views/header.tpl.php';
    //     require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
    //     require_once __DIR__ . '/../views/footer.tpl.php';
    // }
}
