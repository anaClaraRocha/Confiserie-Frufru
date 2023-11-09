<?php
            //require_once "model/categoria.php";
            //require_once "controller/categoria-controller.php";
            //require_once 'dao/daoCategoria.php';

           require_once 'global.php';
       
            header("Location: area-restrita/categoria.php");

        $lista = CategoriaDao::listar();

            $categoria = new Categoria();

            $categoria->setNome($_POST["categoria"]);

            $controller = new CategoriaController($categoria);

            if(!$controller->validaNome($categoria, $lista)){

            categoriaDao::cadastrar($categoria);

            echo("produto cadastrado");
        }else{
                echo("produto não cadastrado, já existe.");
        }
