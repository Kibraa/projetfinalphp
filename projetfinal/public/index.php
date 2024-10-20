<?php

require_once '../app/Router.php';
require_once '../app/Controller.php';

$router = new Router();
$controller = new Controller();

// Routes
$router->add('/', [$controller, 'home']);
$router->add('/products', [$controller, 'products']);
$router->add('/product/:id', [$controller, 'product']);  // Vérifier que :id est bien géré
$router->add('/add-to-cart/:id', [$controller, 'addToCart']);  // Pareil ici pour :id
$router->add('/cart', [$controller, 'cart']);
$router->add('/checkout', [$controller, 'checkout']);

$requestedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestedUrl);
