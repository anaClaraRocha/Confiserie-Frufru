<?php

 require_once('Categoria.php');

    class Produto{

        private $idproduto;
        private $nomeproduto;
        private $precoproduto;
        private $imgproduto;

        private $categoria;

        public function __construct()
        {
            $categoria = new Categoria();
        }

        public function getIdProduto(){
            return $this->idproduto;
        }
        public function setIdProduto($idproduto){
            $this->idproduto=$idproduto;
        }

        public function setNomeProduto($nomeproduto){
            $this->nomeproduto=$nomeproduto;
        }
        public function getNomeProduto(){
            return $this->nomeproduto;
        }

        public function setPrecoProduto($precoproduto){
            $this->precoproduto=$precoproduto;
        }
        public function getPrecoProduto(){
            return $this->precoproduto;
        }

        public function setCategoria($categoria){
            $this->categoria=$categoria;
        }
        public function getCategoria(){
            return $this->categoria;
        }

        public function setImgProduto($imgproduto){
            $this->imgproduto=$imgproduto;
        }
        public function getImgProduto(){
            return $this->imgproduto;
        }

    }

?>