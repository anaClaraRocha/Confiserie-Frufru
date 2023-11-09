<?php 
    include_once("validador.php"); 

	require_once "../model/conexao.php";

	$conexao = Conexao::conectar();

	$selectCat = $conexao->query("SELECT nomeCategoria FROM tbCategoria")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--GRAFICOS DE PIZZA-->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
    <link type="text/css" rel="stylesheet" href="../css/estiloAdmForm.css">
    <link type="text/css" rel="stylesheet" href="../css/estilosAreaRestrista.css">

    <title>ADM</title>
    <link rel="icon" href="../images/iconeLogo.png">

    </head>

    <body>
  
    <div class="sidebar active">
        <div class="logoContent">
            <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
            </svg>
                <div class="logoName">Confiserie Frufru</div>
            </div>
            <!-- logo -->
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <!-- logoContent -->
        <ul class="nav_list">

            <li>
                <a href="index-restrita.php">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links_name">Dashboard</span>
                    <span class="toolipe">Dashboard</span>
                </a>
            </li>      

            <li>
                <a href="categoria.php">
                    <i class='bx bx-chat' ></i>
                    <span class="links_name">Categoria</span>
                    <span class="toolipe">Categoria</span>
                </a>
            </li>

            <li>
                <a href="produto.php">
                <i class='bx bxs-package'></i>
                    <span class="links_name">Produtos</span>
                    <span class="toolipe">Produtos</span>
                </a>
            </li>

            <li>
                <a href="cliente.php">
                    <i class='bx bx-bar-chart' ></i>
                    <span class="links_name">Clientes</span>
                    <span class="toolipe">Clientes</span>
                </a>
            </li>

            <li>
                <a href="form-venda.php">
                    <i class='bx bx-cart-alt' ></i>
                    <span class="links_name">Vendas</span>
                    <span class="toolipe">Vendas</span>
                </a>
            </li>

            
        </ul>
        <!-- nav_list -->
        <div class="profileContent">
            <div class="profile">
                <div class="profileDetail">
                    <img src="../images/brunosalmito.png">
                    <div class="name_job">
                        <div class="name">Nome ADM</div>
                        <div class="job">Administrador</div>
                    </div>
                </div>
                <!-- profileDetail -->
                <a href="../logout.php"> <i class='bx bx-log-out' id="logout"></i> </a>
            </div>
            <!-- profile -->
        </div>
        <!-- profileContent -->
    </div>

    <!-- sidebar -->

    <div class="homeContent">
            <br>
        <section class="dashboard">
        <div class="top">
            <div class="searchBox">
                <ion-icon name="search-outline"></ion-icon>
                <input type="text" placeholder="Pesquisar">
            </div>
            <img src="./logo.png" alt="">
        </div>
    
        <br>

        <!-- FORMULÁRIO -->

        <div class="div-form">
            <form action="../cadastra-produto.php" method="post">
            <center>
                <div class="form-header">
                    
                    <div class="title">
                        <h1>Cadastro de Produto</h1>
                    </div>
                   
                </div>
                </center>

                <div class="input-group">
                    
                    <div class="input-box ">
                        <label for="nome">Nome do Produto</label>
                        <input  name="produto" type="text" size="40" placeholder="Digite o nome do produto" >
                    </div>

                    <div class="input-box">

                    <?php
                         require_once '../dao/CategoriaDao.php';
                          try {
                           $listacategoria = categoriaDao::listar();
                            } catch(Exception $e) {
                             echo '<pre>';
                              print_r($e);
                              echo '</pre>';
                              echo $e->getMessage();
                              } ?>
                                    
                        <label for="categoria">Categoria</label>
                        <select name="slCategoria">
                        <option selected>Escolher...</option>
                                    <?php foreach($listacategoria as $categoria){ ?>
                                    <option value="<?php echo $categoria['idCategoria'];?>">
                                        <?php echo  $categoria['nomeCategoria'];?>
                                    </option>
                                    <?php } ?>
                </select>
                    </div>

                
                    <div class="input-box oi">
                        <label for="valor">Valor</label>
                        <input name="valor" type="text" placeholder="Digite o valor do produto" required>
                    </div>
              
                    <div class="image-upload"><label for="file-input">
                        <img class="imgUpload" src="https://i.pinimg.com/originals/54/38/19/543819d33dfcfe997f6c92171179e4cd.png" id="uploadPreview" style="width: 110px; height: 110px;"/>  
                        <input id="uploadImage" name="foto" type="file" accept="image/*" onchange="PreviewImage();"/>
                    </div> 

                    <br>
                    <div class="continue-button">
                        <button action="../cadastra-produto.php">Cadastrar</button>
                    </div>
                   
                </div>
            </form>
        </div>

        <?php
                    require_once '../dao/ProdutoDao.php';
                    
                    try {
                        $listaproduto = produtoDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
           <div class="modal fade" id="modalExcluirProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="excluir-produto.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            IdProduto: 
                            <input type="text" id="idprodutomodal" name="idprodutomodal" readonly>                          
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Excluir">
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar produto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="alterar-produto.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            IdProduto: 
                            <input type="text" id="id-produto-edit" name="id-produto-edit" readonly>
                            <input type="text" id="nome-produto-edit" name="nome-produto-edit">                          
                            <input type="text" id="preco-produto-edit" name="preco-produto-edit">
                            <select name="sl-categoria" id="sl-categoria-edit">
                        <option selected>Escolher...</option>
                                    <?php foreach($listacategoria as $categoria){ ?>
                                    <option value="<?php echo $categoria['idCategoria'];?>">
                                        <?php echo  $categoria['nomeCategoria'];?>
                                    </option>
                                    <?php } ?>
                </select>                    
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Editar">
                </form>
            </div>
            </div>
        </div>
    </div>

        <!-- TABELA -->
<br>
        <center><h1>Produtos Cadastrados</h1></center>



        <div class="container">
        <table class="fl-table">
            <thead>
                <tr>
                <th>#</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Categoria</th>		
                <th>Valor</th>
                <th>Editar Cancelar Produto</th>		
                <th>Excluir</th>
            </tr>
            </thead>

            <tbody>

            <?php foreach($listaproduto as $produto){ ?>
            <tr>
                <td><?php echo $produto['idproduto']; ?></td>
                <td class="imagem"> <img src="../<?php echo $produto['imgproduto']; ?>"  width="30%"  height="10%"></td>
                <td><?php echo $produto['nomeproduto']; ?></td>		
                <td><?php echo $produto['idcategoria']; ?> </td>
                <td><?php echo $produto['precoproduto']; ?> </td>
                <td><a data-toggle="modal" data-target="#modalEditar" onclick="editarProduto(<?php echo $produto['idproduto'].',\''.$produto['nomeproduto'].'\','.$produto['precoproduto'].','.$produto['idcategoria'];?>)"><i class='bx bx-edit-alt'></i></a></td>
                <td><a data-toggle="modal" data-target="#modalExcluirProduto" onclick="enviarIdProduto('<?php echo $produto['idproduto'];?>')"><i class='bx bx-x-circle'></i></a></td>
            </tr>
            <?php } ?>

                <tbody>
        </table>   
    </div>

   <!-- SCRIPTS DE TODO SITE-->    

    <script>
       
        const btn = document.querySelector('#btn');
        const bxSearch = document.querySelector('.bx-search');
        const sidebar = document.querySelector('.sidebar');
        const home = document.querySelector('.homeContent');

        btn.addEventListener('click',()=>{
            sidebar.classList.toggle('active');
            home.classList.toggle('active');
        });

        function enviarIdProduto(valor) {
            document.getElementById('idprodutomodal').value = valor;
        }


        function editarProduto(id, nome, preco, categoria){
            var id = id;
            var nome = nome;
            var preco = preco;
            var categoria = categoria;

            document.getElementById("id-produto-edit").value=id;
            document.getElementById("nome-produto-edit").value=nome;
            document.getElementById("preco-produto-edit").value=preco;
            document.getElementById("sl-categoria-edit").value=categoria;
        }

    </script>

    <!-- IMG FORM --> 
    <script>

        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };
    </script>

    <!--LINK PARA OS ICONS--> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
 </html>