<?php

    require_once 'global.php';

    header("Location: index-cliente.php");

    session_start();
    
    if (isset($_COOKIE["carrinho"])){
        $carrinhorecebido =  $_COOKIE["carrinho"]; 
        $carrinhoAtual = unserialize($carrinhorecebido);

        $cliente = new Cliente();
        $cliente->setidCliente($_SESSION['idcliente']);  

        $venda = new Venda();
        $venda->setCliente($cliente);
        $venda->setData(date('Y-m-d'));
        $venda->setListaItem($carrinhoAtual);
        $venda->setStatus(1);
        $venda->setValorTotal($_GET['valortotal']);

        VendaDao::cadastrar($venda);

        $venda->setId(VendaDao::consultarId($venda));

        foreach($venda->getListaItem() as $itemvenda){
            ItemVendaDao::cadastrar($itemvenda, $venda->getId());
        }

        unset($_COOKIE['carrinho']);
        setcookie('carrinho');
    }
    else{
        header("Location: index-cliente.php");
    }
?>