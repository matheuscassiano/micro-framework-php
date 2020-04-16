<?php

require_once __DIR__ . '/vendor/autoload.php';

//use App\Router\Route;
//include 'routes/web.php';

$route = new App\Router\Route;

$route->baseURL('/micro-framework-php');

//   method('/route', 'controller', 'action');
$route->get('/', 'Controller', 'home');

$route->post('/comentarios', 'Controller', 'post');
$route->get('/comentarios', 'Controller', 'index');
$route->put('/comentarios', 'Controller', 'put');
$route->delete('/comentarios', 'Controller', 'delete');
