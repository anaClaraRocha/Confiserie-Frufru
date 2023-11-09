<?php

    //require_once('model/cliente.php');
    //require_once('model/conexao.php');

    require_once('global.php');

    class CategoriaDao{

        public static function cadastrar($categoria){

            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbcategoria(nomeCategoria)
                            VALUES (?)";
            $prepareStatement = $conexao->prepare($queryInsert);
            $prepareStatement->bindValue(1, $categoria->getNome());

            $prepareStatement->execute();

            return 'Cadastro realizado com sucesso';

        }

        public static function delete($categoria){
            $conexao = Conexao::conectar();

            $queryDelete = "DELETE FROM tbcategoria WHERE idCategoria = ?";

            $prepareStatement = $conexao->prepare($queryDelete);
            $prepareStatement->bindValue(1, $categoria->getId());

            $prepareStatement->execute();
        }

        public static function editar($categoria){
            $conexao = Conexao::conectar();

            $queryUpdate = "UPDATE tbcategoria SET nomeCategoria = ? WHERE idCategoria = ?";

            $prepareStatement = $conexao->prepare($queryUpdate);
            $prepareStatement->bindValue(1, $categoria->getNome());
            $prepareStatement->bindValue(2, $categoria->getId());

            $prepareStatement->execute();
        }

        public static function listar(){
            $conexao = Conexao::conectar();

            $querySelect = ("SELECT idCategoria, nomeCategoria FROM tbcategoria");

            $result = $conexao->prepare($querySelect);
            $result->execute();
            $lista = $result->fetchAll();

            return $lista;
        }

    }

?>