<?php

namespace App\Controller;
  
use App\Model\PDOConnection;

class Controller 
{    
    public function home()
    {
        echo 'Main Page';
    }

    public function post($req)
    {
        PDOConnection::create('comentarios', $req);
    }

    public function index()
    {
        PDOConnection::read('comentarios');
    }

    public function put($req)
    {
        PDOConnection::update('comentarios', 'commentId', $req);
    }

    public function delete($id)
    {   
        PDOConnection::delete('comentarios', 'commentId', $id);
    }
}
