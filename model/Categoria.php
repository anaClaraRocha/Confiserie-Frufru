<?php

    class Categoria{

        private $nomeCategoria;
        private $idcategoria;

        public function getId(){
            return $this->idcategoria;
        }

        public function setId($idcategoria){
            $this->idcategoria = $idcategoria;
        }
        
        public function getNome(){
            return $this->nomeCategoria;
        }

        public function setNome($nomeCategoria){
            $this->nomeCategoria = $nomeCategoria;
        }

    }