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
        $method = $this->method();

        if($method == 'GET'){
            $this->routes[$this->baseURL.$route] = array ('controller' => $controller, 'action' => $action, 'request' => '');  
            $this->run($this->getURL());
        }
    }

    public function post($route, $controller, $action)
    {
        $method = $this->method();
     
        if($method == 'POST'){
            $req = $_POST;

            $this->routes[$this->baseURL.$route] = array ('controller' => $controller, 'action' => $action, 'request' => $req);  
            $this->run($this->getURL());
        }
        
    }

    public function put($route, $controller, $action)
    {
        $method = $this->method();
     
        if($method == 'PUT'){
            /** Transformar em função **/
            $id = $this->getURL();
            $baseRoute = $this->baseURL.$route.'/';
            $id = str_replace($baseRoute, '', $id);
            /***************************/
            // parse_str(file_get_contents('php://input'), $_PUT);

            $req = $_GET;
            $this->routes[$this->baseURL.$route.'/'.$id] = array ('controller' => $controller, 'action' => $action, 'request' => ['id' => $id, 'params' => $req]);  
            $this->run($this->getURL());
        }
        
    }

    public function delete($route, $controller, $action)
    {
        $method = $this->method();
     
        if($method == 'DELETE'){
           /** Transformar em função **/
           $id = $this->getURL();
           $baseRoute = $this->baseURL.$route.'/';
           $id = str_replace($baseRoute, '', $id);
           /***************************/
            
            $this->routes[$this->baseURL.$route.'/'.$id] = array ('controller' => $controller, 'action' => $action, 'request' => $id);  
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
    
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
