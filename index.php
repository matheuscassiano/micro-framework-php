<?php

require_once __DIR__ . '/vendor/autoload.php';
use App\Router;

include 'App//router//router.php';

$route = new Route();

$route->baseURL('/framework');

# initRoutes($route, $controller, $action);
$route->initRoutes('/', 'indexController', 'index');
$route->initRoutes('/users', 'indexController', 'index');
$route->initRoutes('/conteudo', 'indexController', 'post');
