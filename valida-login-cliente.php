<?php
    //require_once("model/Cliente.php");
    //require_once "dao/daoClienteLogin.php";

    require_once ("global.php");

    $cliente = new Cliente();
    
    $cliente->setEmailCliente($_POST['txtlogin']);
    $cliente->setSenhaCliente($_POST['txtsenha']);
    
    try {
        $consultacliente = ClienteDao::consultarlogin($cliente);

        if($consultacliente == 0){
            header("Location: index.php");
        }
        else{
            foreach($consultacliente as $cliente){
                header("Location: ./area-cliente/index-cliente.php");
                session_start();
                $_SESSION['idcliente'] = $cliente['idcliente'];
                $_SESSION['nomecliente'] = $cliente['nomecliente'];
                $_SESSION['logincliente'] = $cliente['emailcliente'];
                $_SESSION['senhacliente'] = $cliente['senhacliente'];
            }
        }  
    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

    
?>