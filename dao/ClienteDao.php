<?php

    // require_once('model/cliente.php');
    // require_once('model/conexao.php');

    require_once('global.php');

    class ClienteDao{

        public static function cadastrar($cliente){

            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO  tbcliente(nomeCliente, cpfCliente, emailCliente, senhaCliente, 
            logradouroCliente, numLogCliente, compCliente, bairroCliente, cidadeCliente, ufCliente, cepCliente)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                                //  1  2  3  4  5  6  7  8  9  10 11
            $prepareStatement = $conexao->prepare($queryInsert);

            $prepareStatement->bindValue(1, $cliente->getNomeCliente());
            $prepareStatement->bindValue(2, $cliente->getCpfCliente());
            $prepareStatement->bindValue(3, $cliente->getEmailCliente());
            $prepareStatement->bindValue(4, $cliente->getSenhaCliente());
            $prepareStatement->bindValue(5, $cliente->getLogradouroCliente());
            $prepareStatement->bindValue(6, $cliente->getNumLogCliente());
            $prepareStatement->bindValue(7, $cliente->getCompCliente());
            $prepareStatement->bindValue(8, $cliente->getBairroCliente());
            $prepareStatement->bindValue(9, $cliente->getCidadeCliente());
            $prepareStatement->bindValue(10, $cliente->getUfCliente());
            $prepareStatement->bindValue(11, $cliente->getCepCliente());

            $prepareStatement->execute();

            return 'Cadastro realizado com sucesso';

        }

        public static function consultarlogin($cliente){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idcliente, nomecliente, emailcliente, senhacliente 
                            FROM tbcliente WHERE emailcliente LIKE '".$cliente->getEmailCliente()."' 
                            AND senhacliente LIKE '".$cliente->getSenhaCliente()."'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            $n = count($lista);
            if ($n == 1)
                return $lista;   
            else
                return 0;
        }

        public static function delete($cliente){
            $conexao = Conexao::conectar();

            $queryDelete = $conexao->prepare("DELETE FROM tbcliente WHERE idCliente = ?");

            $prepareStatement = $conexao->prepare($queryDelete);

            $prepareStatement->bindValue(1, $cliente->getIdCliente());

            $prepareStatement->execute();
        }

        public static function editar($cliente){
            $conexao = Conexao::conectar();

            $queryUpdate = $conexao->prepare("UPDATE tbcliente SET nomeCliente = ? WHERE idCliente = ?");

            $prepareStatement = $conexao->prepare($queryUpdate);

            $prepareStatement->bindValue(1, $cliente->getNomeCliente());
            $prepareStatement->bindValue(2, $cliente->getIdCliente());

            $prepareStatement->execute();
        }

        public static function listar(){
            $conexao = Conexao::conectar();

            $querySelect = ("SELECT idCliente, nomeCliente, cpfCliente, emailCliente, senhaCliente, 
            logradouroCliente, numLogCliente, compCliente, bairroCliente,
            cidadeCliente, ufCliente, cepCliente FROM tbCliente");

            $result = $conexao->prepare($querySelect);
            $result->execute();
            $lista = $result->fetchAll();

            return $lista;
        }

        public static function clienteCadastrados(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idcliente) AS cliente FROM tbcliente ";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['cliente'];   
        }

        public static function maiorCompra(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT MAX(valortotalvenda) AS maior FROM tbvenda WHERE  ";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['maior'];   
        }

    }

?>