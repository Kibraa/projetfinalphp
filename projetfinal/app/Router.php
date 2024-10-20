<?php

class Router {
    private $routes = [];

    public function add($url, $action) {
        $this->routes[$url] = $action;
    }

    public function dispatch($url) {
        foreach ($this->routes as $route => $action) {
            $routePattern = preg_replace('/:\w+/', '(\d+)', $route);
            if (preg_match("#^$routePattern$#", $url, $matches)) {
                array_shift($matches); // Supprimer le premier élément qui est l'URL complète
                return call_user_func_array($action, $matches);
            }
        }
        echo "404 - Page non trouvée";
    }
}
