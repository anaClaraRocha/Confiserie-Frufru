<?php

  //require_once "model/produto.php";

  require_once 'global.php';

    class ProdutoController{

        private $produto;

        public function __construct($produto){
            $this->produto = $produto;
        }

        public function cadastraProduto($produto){

            if($produto->getPrecoProduto()>0){
                $produto->setPrecoProduto(str_replace(",", ".", $produto->getPrecoProduto()));
                return true;
            }else{
                return false;
            }
        }

    }

?>