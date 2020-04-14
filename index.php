<?php

require_once 'vendor/autoload.php';

use App\Router\Route;

//include 'routes/web.php';
//include 'App\router\routes.php';

$route = new Route();

$route->baseURL('/framework');

// initRoutes($route, $controller, $action);
$route->initRoutes('/', 'indexController', 'index');
$route->initRoutes('/users', 'indexController', 'index');
$route->initRoutes('/conteudo', 'indexController', 'conteudo');
$route->initRoutes('/conteudo', 'indexController', 'post');
$route->initRoutes('/comentaios', 'indexController', 'comments');
