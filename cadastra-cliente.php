<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='css/apresentar.css'>
    <title>Cadastro Cliente</title>
    <link rel="icon" href="images/iconeLogo.png">
</head>
<body>

    <div class="container">
        
        <?php
            // require_once "model/cliente.php";
            // require_once "controller/cliente-controller.php";
            // require_once 'dao/daoCliente.php';

            require_once 'global.php';

            $cliente = new Cliente();

            $cliente->setNomeCliente($_POST["nome"]);
            $cliente->setCpfCliente($_POST["cpf"]);
            $cliente->setEmailCliente($_POST["email"]);
            $cliente->setCepCliente($_POST["cep"]);
            $cliente->setLogradouroCliente($_POST["rua"]);
            $cliente->setSenhaCliente($_POST["senha"]);

            $cliente->setNumLogCliente($_POST["numero"]);
            $cliente->setBairroCliente($_POST["bairro"]);
            $cliente->setCidadeCliente($_POST["cidade"]);
            $cliente->setUfCliente($_POST["estado"]);
            $cliente->setCompCliente($_POST["complemento"]);

            $lista = ClienteDao::listar();

            $controller = new ClienteController($cliente);

            if(!$controller->validaCpf($cliente) && !$controller->validaEmail($cliente)){

                ClienteDao::cadastrar($cliente);
    
                echo("<br><center><h1>Cadastro de Cliente</h1> </center>");
 
                echo("<div class='textoProduto'> <center><br> O Cliente com o nome ".$cliente->getNomeCliente()." e E-mail ".$cliente->getEmailCliente()." foi cadastrada com sucesso!</center> </div><br>");
           
            }else{

                echo("<br><center><h1>Cadastro de Cliente não realizado</h1> </center>");

                    echo("Não cadastrado, pois CPF e Email já existe. <br>");
            }
           
        ?>
           

<br>

                   <center><div class="login-button">
                        <button><a href="login.php">Voltar</a></button>
                    </div></center>
                    <br>
    </div>
    
</body>
</html>
