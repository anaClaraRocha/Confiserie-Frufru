<?php
    //require_once "../model/categoria.php";
    //require_once "../controller/categoriaController.php";

    require_once "global.php";

   header('Location: categoria.php');

    $categoria = new Categoria();
    //$categoria->setNomeCategoria($_POST['categoria-veiculo-edit']);
    $categoria->setId($_POST['id-categoria']);

    // $categoriaController = new categoriaController($categoria);

    CategoriaDao::delete($categoria);
    
?>
