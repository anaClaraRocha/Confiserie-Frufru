<?php
    
    require_once 'global.php';
    
    class VendaDao{

        public static function cadastrar($venda){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbvenda(datavenda, valortotalvenda, statusvenda, idcliente)
                             VALUES(?,?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $venda->getData());
            $prepareStatement->bindValue(2, $venda->getValorTotal());
            $prepareStatement->bindValue(3, $venda->getStatus());
            $prepareStatement->bindValue(4, $venda->getCliente()->getIdCliente());

            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function consultarId($venda){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT MAX(idvenda) AS maior FROM tbvenda
                            WHERE idcliente = ".$venda->getCliente()->getIdCliente();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $venda)
                return $venda['maior'];   
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idvenda, DATE_FORMAT(datavenda, '%d/%m/%Y') AS datavenda, 
                            valortotalvenda, statusvenda, v.idcliente, nomecliente 
                            FROM tbvenda v INNER JOIN tbcliente c 
                            ON v.idcliente = c.idcliente 
                            ORDER BY datavenda DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public static function contar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idvenda) AS qtde FROM tbvenda";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];   
        }

        public static function contarClienteVenda(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idcliente, COUNT(idvenda) AS qtde FROM tbvenda GROUP BY idcliente ORDER BY qtde DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $cliente)
                return $cliente['idcliente'];   
        }

        public static function atualizarStatus($venda){
            $conexao = Conexao::conectar();

            $queryInsert = "UPDATE tbvenda 
                            SET statusvenda = ?
                            WHERE idvenda = ?";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $venda->getStatus());
            $prepareStatement->bindValue(2, $venda->getId());

            $prepareStatement->execute();
            return 'Atualizou';
        }

        public static function contarPedido(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idvenda) AS qtde FROM tbvenda WHERE statusvenda = 1";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];   
        }

        public static function pedidosFinalizados(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idvenda) AS qtdef FROM tbvenda WHERE statusvenda = 5";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtdef'];   
        }

        public static function pedidosCancelados(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idvenda) AS qtdef FROM tbvenda WHERE statusvenda = 4";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtdef'];   
        }

        public static function listarPorCliente($cliente){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idvenda, DATE_FORMAT(datavenda, '%d/%m/%Y') AS datavenda, 
                            valortotalvenda, statusvenda, v.idcliente, nomecliente 
                            FROM tbvenda v INNER JOIN tbcliente c 
                            ON v.idcliente = c.idcliente 
                            WHERE v.idcliente = ".$cliente->getIdCliente()."
                            ORDER BY datavenda DESC";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
        
        public static function maiorVenda(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT MAX(valortotalvenda) AS Valor FROM tbvenda ";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['Valor'];   
        }

        public static function clienteMaisComprou(){
            $conexao = Conexao::conectar();

            $querySelect = "SELECT nomeCliente, COUNT(idVenda) AS qtde FROM tbCliente
                            INNER JOIN tbVenda ON tbCliente.idCliente = tbVenda.idCLiente
                            ORDER BY qtde LIMIT 1";
                           
            $resultado = $conexao->query($querySelect);
            $nome = $resultado->fetchAll();
            foreach ($nome as $n)
                return $n['nomeCliente'];   
        }

    }
?>