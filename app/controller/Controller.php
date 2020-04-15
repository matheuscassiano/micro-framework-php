<?php

namespace App\Controller;
  
use App\Model\PDOConnection;

class Controller 
{    
    public function index()
    {
        PDOConnection::read('usuarios');
        PDOConnection::read('comentarios');
    }

    public function show()
    {
        PDOConnection::read('usuarios');
    }

    public function comments()
    {
        if (empty($_POST)) {
            PDOConnection::read('comentarios');
        }
    }

    public function post($req)
    {
        print_r($req);
        PDOConnection::create('comentarios', $req);
    }

    public function removeComment()
    {   
        //print_r($_DELETE);
        $id = 1;
        
        // $id = $req['id'];
        //PDOConnection::delete('comentarios', $id);
    }
}
