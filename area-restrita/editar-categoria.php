<?php
    //require_once "../models/categoria.php";
    //require_once "../controller/categoriaController.php";

    require_once "global.php";

    header('Location: categoria.php');

    $categoria = new Categoria();
    $categoria->setnome($_POST['nome-categoria']);
    $categoria->setId($_POST['id-categoria']);

    $categoriaController = new CategoriaController($categoria);

        CategoriaDao::editar($categoria);
    
?>
