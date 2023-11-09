<?php
    
   // require_once('model/produto.php');
   // require_once('model/conexao.php');

    require_once('global.php');

    class ProdutoDao{

        public static function cadastrar($produto){

            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbproduto(nomeProduto, precoProduto, idCategoria)
                                      VALUES (?, ?, ?)";

            $prepareStatement = $conexao->prepare($queryInsert);

            $prepareStatement->bindValue(1, $produto->getNomeProduto());
            $prepareStatement->bindValue(2, $produto->getPrecoProduto());
            $prepareStatement->bindValue(3, $produto->getCategoria()->getId());

            $prepareStatement->execute();

            return 'Cadastro realizado com sucesso';

        }

        public static function consultarId($produto){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idproduto FROM tbproduto WHERE nomeproduto LIKE '".$produto->getNomeProduto()."'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $produto)
                $id = $produto['idproduto'];
            return $id;   
        }

        public static function atualizarFoto($produto){
            $conexao = Conexao::conectar();

            $queryInsert = "UPDATE tbProduto
                            SET imgProduto = ?
                            WHERE idproduto = ?";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $produto->getImgProduto());
            $prepareStatement->bindValue(2, $produto->getIdProduto());

            $prepareStatement->execute();
            return 'Atualizou';
        }

        public static function consultarDados($produto){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT nomeproduto, precoproduto, imgproduto
                             FROM tbproduto WHERE idproduto = ".$produto->getIdProduto();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $p){
                $produto->setNomeProduto($p['nomeproduto']);
                $produto->setPrecoProduto($p['precoproduto']);
                $produto->setImgProduto($p['imgproduto']);
            }
            return $produto;   
        }

        public static function contar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idproduto) AS qtde FROM tbproduto";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];   
        }

        public static function delete($produto){
            $conexao = Conexao::conectar();

            $queryDelete = "DELETE FROM tbproduto WHERE idProduto = ?";

            $prepareStatement = $conexao->prepare($queryDelete);
            $prepareStatement->bindValue(1, $produto->getIdProduto());

            $prepareStatement->execute();
        }

        public static function editar($produto){
            $conexao = Conexao::conectar();

            $queryUpdate = "UPDATE tbproduto SET nomeproduto = ?, precoproduto = ?, 
                                             idcategoria = ?  WHERE idproduto = ?";

            $prepareStatement = $conexao->prepare($queryUpdate);
            $prepareStatement->bindValue(1, $produto->getNomeProduto());
            $prepareStatement->bindValue(2, $produto->getPrecoProduto());
            $prepareStatement->bindValue(3, $produto->getCategoria()->getId());
            $prepareStatement->bindValue(4, $produto->getIdProduto());

            $prepareStatement->execute();
        }

        public static function listar(){
            $conexao = Conexao::conectar();

            $querySelect = ("SELECT idproduto, nomeproduto, precoproduto, idcategoria, imgproduto FROM tbproduto");

            $result = $conexao->prepare($querySelect);
            $result->execute();
            $lista = $result->fetchAll();

            return $lista;
        }
    }

?>