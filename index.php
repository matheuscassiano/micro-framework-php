<?php

require_once __DIR__ . '/vendor/autoload.php';

//use App\Router\Route;
//include 'routes/web.php';

$route = new App\Router\Route;

$route->baseURL('/micro-framework-php');

//   method('/route', 'controller', 'action');
$route->get('/', 'Controller', 'index');
$route->get('/users', 'Controller', 'show');

$route->post('/comentarios', 'Controller', 'post');
$route->get('/comentarios', 'Controller', 'comments');
