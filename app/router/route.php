<?php

namespace App\Router;
use App\Controller\indexController;

class Route
{
    private $routes;
    public $baseURL;
 
    public function baseURL($bUrl)
    {   
        $this->baseURL = $bUrl;
    }
    
    public function get($route, $controller, $action)
    {
        if(empty($_POST)){
            $this->routes[$this->baseURL.$route] = array ('controller' => $controller, 'action' => $action, 'request' => '');  
            $this->run($this->getURL());
        }
    }

    public function post($route, $controller, $action)
    {
        if(!empty($_POST)){
            $req = $_POST;

            $this->routes[$this->baseURL.$route] = array ('controller' => $controller, 'action' => $action, 'request' => $req);  
            $this->run($this->getURL());
        }
        
    }
    
    public function run($url)
    {
        if (array_key_exists($url, $this->routes)){
            $class = "\\App\\controller\\" . $this->routes[$url]['controller'];
            $controller = new $class;
            $action = $this->routes[$url]['action'];
            $controller->$action($this->routes[$url]['request']);
            $this->routes = [];
        } 
    }
    
    public function getURL()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
