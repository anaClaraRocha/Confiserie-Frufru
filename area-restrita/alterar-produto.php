<?php

require_once('global.php');

header("Location: produto.php");

$produto = new Produto();

$produto->setIdProduto($_POST['id-produto-edit']);
$produto->setNomeProduto($_POST['nome-produto-edit']);
$produto->setPrecoProduto($_POST['preco-produto-edit']);

$categoria = new Categoria();

$categoria->setId($_POST['sl-categoria']);
$produto->setCategoria($categoria);

    ProdutoDao::editar($produto);
