<?php

require_once __DIR__ . '/vendor/autoload.php';
use App\Router;

//include 'routes/web.php';


include '..\app\router\routes.php';

$route = new Route();

$route->baseURL('/framework');

// initRoutes($route, $controller, $action);
$route->initRoutes('/', 'indexController', 'index');
$route->initRoutes('/users', 'indexController', 'index');
$route->initRoutes('/conteudo', 'indexController', 'conteudo');
$route->initRoutes('/conteudo', 'indexController', 'post');
$route->initRoutes('/comentaios', 'indexController', 'comments');
