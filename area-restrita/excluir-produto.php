<?php

     header('Location: produto.php');

    require_once('global.php');

    $produto = new Produto();
    $produto->setIdProduto($_POST['idprodutomodal']);

    ProdutoDao::delete($produto);

?>