<?php
            //require_once "model/produto.php";
            //require_once "controller/produtoController.php";
            //require_once "dao/daoProduto.php";
            //require_once "model/categoria.php";

            require_once "global.php";

            header("Location: area-restrita/produto.php");

            $produto = new Produto();

            $produto->setNomeProduto($_POST['produto']);
            $produto->setPrecoProduto($_POST['valor']);

            $categoria = new Categoria();
            $categoria->setId($_POST['slCategoria']);

            $produto->setImgProduto($_POST['foto']);
        
            $produto->setCategoria($categoria);
        
            //cadastrando produto sem a foto
            ProdutoDao::cadastrar($produto);

    $produto->setIdProduto(ProdutoDao::consultarId($produto));

    //nome original do arquivo no computador do usuário
    $nome = $_FILES['foto']['produto'];

    //para validações que possam ser necessárias, na nossa loja não será origatório
    $tipo =$_FILES['foto']['type'];// exemplo image/gif
    $tamanho = $_FILES['foto']['size']; // tamanho em bytes

    //nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
    $arquivo = $_FILES['foto']['tmp_name'];

    $diretorio = "images/produtos/";
    
    $extensao = substr($nome, -5);//pega o ponto e os 3 caracteres da extensão do arquivo
    $nomenovo = $produto->getImgProduto().$extensao;

    $nomecompleto =  $diretorio.$nomenovo;

    move_uploaded_file($arquivo, "../".$nomecompleto);

    $produto->setImgProduto($nomecompleto);

    ProdutoDao::atualizarFoto($produto);

?>