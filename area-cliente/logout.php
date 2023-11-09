<?php
    header("Location: ../index.php");
    
    session_start();
    unset($_SESSION['idcliente']);
    unset($_SESSION['nomecliente']);
    unset($_SESSION['logincliente']);
    unset($_SESSION['senhacliente']);
    session_destroy();
?>
