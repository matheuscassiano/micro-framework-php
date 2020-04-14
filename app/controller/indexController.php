<?php

namespace App\Controller;
  
include 'App//model//produtos.php';
include 'App//model//connections.php';

class indexController 
{    
    protected $view;
    public $produtos;

    public function index()
    {
        showTable('usuarios');
    }

    public function conteudo()
    {
        $this->render('form.php');
    }
    
    public function comments()
    {
        showTable('comentarios');
    }

    public function post()
    {
        if (!empty($_POST)) {
            $req = $_POST;
            print_r($req);
            
            $sql = "INSERT INTO comentarios (name, email, message) VALUES ('" . $req['name'] . "', '" . $req['email'] . "', '" .  $req['message'] . "')";
            //insert('comentarios', ('name, email, message'))->values(1,2,3)
            databaseInsert($sql);
        }
    }

    public function render($template) 
    {
        include 'App//view//' . $template;
    }
    
}
