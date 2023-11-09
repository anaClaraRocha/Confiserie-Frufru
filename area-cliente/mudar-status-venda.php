<?php

    require_once 'global.php';

    header("Location: compras-cliente.php");

    $venda = new Venda();
    $venda->setId($_POST['idvendaModal']);
    $venda->setStatus($_POST['status']);

    VendaDao::atualizarStatus($venda);

?>