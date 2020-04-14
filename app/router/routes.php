<?php

namespace App\Router;

include 'App//controller//indexController.php';

class Route 
{
    private $routes;
    private $baseURL;
 
    public function baseURL($bUrl)
    {
        $this->baseURL = $bUrl;
    }
    
    public function initRoutes($route, $controller, $action)
    {
        $this->routes[$this->baseURL.$route] = array ('controller' => $controller, 'action' => $action);
        $this->run($this->getURL());
    }
    
    public function run($url)
    {
        if (array_key_exists($url, $this->routes)){
            $class = "\\App\\controller\\" . $this->routes[$url]['controller'];
            $controller = new $class;
            $action = $this->routes[$url]['action'];
            $controller->$action();
            $this->routes = [];
        } 
    }
    
    public function getURL()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
