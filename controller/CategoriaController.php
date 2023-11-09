<?php

  //require_once "model/categoria.php";
  require_once "global.php";

    class CategoriaController{

        private $categoria;

        public function __construct($categoria){
            $this->categoria = $categoria;
        }

        public function validaNome($categoria, $nomeCategoria){
            $existente = false;

            for($i = 0; $i < count($nomeCategoria); $i++){
                if(strtoupper($categoria->getNome()) == strtoupper($nomeCategoria[$i][1])) {
                    $existente = true;
                    break;
                }else{
                    $existente = false;
                }
            }
            return $existente;
        }

    }

?>