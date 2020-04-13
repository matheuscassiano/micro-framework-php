<?php

namespace App\Controller;
  
include 'App//model//produtos.php';
include 'App//model//connections.php';

class indexController {
    
    protected $view;
    public $produtos;
    
    //put your code here
/*    public function index() {
        $this->render('index.php','template.php');
    }
    public function lista() {
        $modelProdutos = new \App\model\produtos();
        $this->produtos = $modelProdutos->RetornaProdutos();
        $this->render('lista.php','template.php');
    }
    
    
    public function conteudo() {
        $this->render('conteudo.php','template.php');
    }
*/

    public function index(){
        showTable('usuarios');
    }

    public function post(){

    }
    



    /** Feito para adicionar conteudo no template.php **/
    public function content() {
        include $this->view;
    }
    
    public function render($view, $template) {
        $this->view = 'App//view//www//' . $view;
        include 'App//view//' . $template;
    }
    
}
