<?php

    require_once 'global.php';

    header("Location: produtos-cliente.php");

    $produto = new Produto();
    $produto->setIdProduto($_GET['idproduto']);
    $produto = ProdutoDao::consultarDados($produto);

    $item = new ItemVenda();
    $item->setQtde(1);
    $item->setProduto($produto);
    $item->setSubtotal($item->getQtde() * $item->getProduto()->getPrecoProduto());

    if (isset($_COOKIE["carrinho"])){
        $carrinhorecebido =  $_COOKIE["carrinho"]; 
        $carrinhoAtual = unserialize($carrinhorecebido);

        $carrinhoAtual[] = $item;
        $carrinhocookie = serialize($carrinhoAtual);
        setcookie('carrinho', $carrinhocookie);
    }
    else{
        $carrinho = array();

        $carrinho[] = $item;
        
        $carrinhocookie = serialize($carrinho);
        setcookie('carrinho', $carrinhocookie);

    }

?>