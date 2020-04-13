<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\model;

/**
 * Description of produtos
 *
 * @author alfamidia
 */
class produtos {
    private $produtos;
    //put your code here
    public function LerProdutos() {
        $this->produtos = ['primeiro item vindo do model', 'segundo item vindo do model', 'terceiro item vindo do model'];
    }
    public function RetornaProdutos() {
        $this->LerProdutos();
        return $this->produtos;
    }
}
