<?php
    
    //require_once "../dao/daoClienteLogin.php";
    //require_once("../model/Cliente.php");

    require_once 'global.php';
    
    try {
        session_start();

        $cliente = new Cliente();
    
        $cliente->setEmailCliente($_SESSION['logincliente']);
        $cliente->setSenhaCliente($_SESSION['senhacliente']);

        $consultacliente = ClienteDao::consultarlogin($cliente);

        if($consultacliente == 0){
            header("Location: ./../index.php");
        }       

    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>