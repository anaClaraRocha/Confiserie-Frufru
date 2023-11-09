<?php 
    include_once("validador.php"); 

    require_once "global.php";
    require_once "../model/conexao.php";

	$conexao = Conexao::conectar();
?>



<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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

        <!-- FORMULÁRIO -->

       <center>
        <div class="div-form">
            <form action="../cadastra-categoria.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro de Categoria</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="categoria">Nome da Categoria</label>
                        <input id="categoria" name="categoria" type="text" size="40" placeholder="Digite o nome da categoria" required>
                    </div>

                    <div class="continue-button">
                        <br>
                            
                        <button ><a>Cadastrar</a></button>
                    </div>
                </div>
            </form>
        </div>
        </center>

        <?php
                    require_once '../dao/CategoriaDao.php';
                    
                    try {
                        $listacategoria = categoriaDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
        
     <!-- TABELA -->

     <center><h1>Categorias Cadastradas</h1></center>
     
        <table style="width:100%">
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php for ($i = 0; $i < count(CategoriaDao::listar()); $i++) {
                print("
            <tr>
                <td> " . CategoriaDao::listar()[$i][0] . " </td>
                <td> " . CategoriaDao::listar()[$i][1] . " </td>
                <td><a data-toggle='modal' data-target='#ModalEditar' style='cursor: pointer;' onclick='editarCategoria(" . CategoriaDao::listar()[$i][0] . ", \"" . CategoriaDao::listar()[$i][1]. "\")'><i class='bx bx-edit-alt'></i></a></td>
                <td><a data-toggle='modal' data-target='#ModalExclui' style='cursor: pointer;' onclick='excluirCategoria(" . CategoriaDao::listar()[$i][0] . ")'><i class='bx bx-x-circle'></i></a></td>
            </tr>
            ");
            }
            ?>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="ModalExclui" tabindex="-1" role="dialog"
										aria-labelledby="ModalExclui" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header" style="background-color: #D10024;">
													<h5 class="modal-title" id="ModalExclui" style="color: white; font-size: 16px; font-weight: bold;">Excluir Categoria</h5>
													<button type="button" class="close" data-dismiss="modal"  style="text-align: right;"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												
													<form class="form-cliente" action="excluir-categoria.php" method="POST">
												<div class="modal-body">
													
													

														<div class="form sign-in" style="width: 100%; height: auto; padding: 0px">

															<center>
																<label>
																<input type="hidden" name="id-categoria" id="id-categoria">
																<input type="text" name="id-categoria" id="id-categoria-delete">
																	<span>Deseja Realmente excluir categoria?</span>
																</label>
															</center>

															
														</div>
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal"  style="font-size:  13px;">Cancelar</button>
													<button type="submit" class="btn btn-primary" style="font-size:  13px;">Excluir</button>
												</div>

												</form>
											</div>
										</div>
									</div>

                                    <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog"
										aria-labelledby="ModalEditar" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header" style="background-color: #D10024;">
													<h5 class="modal-title" id="ModalExclui" style="color: white; font-size: 16px; font-weight: bold;">Excluir Categoria</h5>
													<button type="button" class="close" data-dismiss="modal"  style="text-align: right;"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												
													<form class="form-cliente" action="editar-categoria.php" method="POST">
												<div class="modal-body">
													
													

														<div class="form sign-in" style="width: 100%; height: auto; padding: 0px">

															<center>
																<label>
																<input type="text" name="id-categoria" id="id-categoria-edit" readonly>
                                                                <input type="text" name="nome-categoria" id="nome-categoria-edit">
																	<span>Deseja Realmente editar categoria?</span>
																</label>
															</center>

															
														</div>
													
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal"  style="font-size:  13px;">Cancelar</button>
													<button type="submit" class="btn btn-primary" style="font-size:  13px;">Editar</button>
												</div>

												</form>
											</div>
										</div>
									</div>


    <!--SCRIPTS DE TODO SITE    

    <script>
       
        const btn = document.querySelector('#btn');
        const bxSearch = document.querySelector('.bx-search');
        const sidebar = document.querySelector('.sidebar');
        const home = document.querySelector('.homeContent');

        btn.addEventListener('click',()=>{
            sidebar.classList.toggle('active');
            home.classList.toggle('active');
        });
    </script>-->

    <script>

function editarCategoria(id, nome){
    var id = id;
    var nome = nome;
    document.getElementById("id-categoria-edit").value=id;
    document.getElementById("nome-categoria-edit").value=nome;
}


function excluirCategoria(id){
    
    document.getElementById("id-categoria-delete").value=id;
    
}
</script>

    <!--LINK PARA OS ICONS--> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </body>
 </html>