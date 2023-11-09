<?php 
    include_once("validador.php"); 
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

    <link type="text/css" rel="stylesheet" href="../css/estilosAreaRestrista.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  
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
        <h2> Dashboard
            <br>
        <section class="dashboard">
        <div class="top">
            <div class="searchBox">
                <ion-icon name="search-outline"></ion-icon>
                <input type="text" placeholder="Pesquisar">
            </div>
            <img src="./logo.png" alt="">
        </div>


            <div class="form-header">
                    <div class="title">
                        <h1>Status da Vendas</h1>
                    </div>
                </div>

            <?php
                    require_once 'global.php';
                    try {
                        $listavenda = VendaDao::listar();
                        $qtdePedido = VendaDao::contarPedido();
                        $finalizados = VendaDao::pedidosFinalizados();
                        $cancelados = VendaDao::pedidosCancelados();
                        $listaitens = ItemVendaDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>

<div class="container">
            <div class="overview">
                
                <div class="boxes">

                <div class="box box4">
            <ion-icon name="bag-add-outline"></ion-icon>
                <span class="text">Vendas não Finalizadas: </span>
                <span class="number2"><?php echo $qtdePedido; ?></span>
            </div>

            <div class="box box5">
                <ion-icon name="bag-check-outline"></ion-icon>
                <span class="text">Pedidos Finalizados: </span>
                <span class="number2"><?php echo $finalizados; ?></span>
            </div>

            <div class="box box6">
            <ion-icon name="close-circle-outline"></ion-icon>
                <span class="text">Pedidos Cancelados pelo Clientes</span>
                <span class="number2"><?php echo $cancelados; ?> </span>
            </div>
                </div>
            </div>
                </div>

<br>

            <?php
                    require_once 'global.php';
                    try {
                        $listavenda = VendaDao::listar();
                        $qtdePedido = VendaDao::contarPedido();
                        $finalizados = VendaDao::pedidosFinalizados();
                        $listaitens = ItemVendaDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>


          
                <div class="alert alert-danger" role="alert">
                    <h3>Status da Venda </h3>
                    <div class="row">
                        <div  class="col" >
                            1 - Pedido pelo cliente <br>
                            2 - Confirmado pela loja
                        </div>
                        <br>
                        <div class="col">
                            3 - Cancelado pelo cliente <br>
                            4 - Cancelado pela loja – falta de estoque
                        </div>
                        <div class="col">
                            5 - Venda finalizada – produtos enviados
                        </div>
                    </div>
                </div>

                <br>
                
              
                
            <br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data da Venda</th>
                            <th scope="col">Valor Total</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Ver itens</th>
                            <th scope="col">Status</th>
                            <th scope="col">Atualizar status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($listavenda as $venda){ 
                                switch($venda['statusvenda']){
                                    case 1: $status = 'Pedido pelo cliente'; break;
                                    case 2: $status = 'Confirmado pela loja'; break;
                                    case 3: $status = 'Cancelado pelo cliente'; break;
                                    case 4: $status = 'Cancelado pela loja – falta de estoque'; break;
                                    case 5: $status = 'Venda finalizada – produtos enviados'; break;                                    
                                }
                        ?>
                        <tr>
                            <th scope="row"><?php echo $venda['idvenda']; ?></th>
                            <td><?php echo $venda['datavenda']; ?></td>
                            <td><?php echo number_format($venda['valortotalvenda'], 2, '.',','); ?></td>
                            <td><?php echo $venda['idcliente']."-".$venda['nomecliente']; ?></td>
                            <td><a data-toggle="modal" data-target="#modalItensVenda" class="btn btn-info" onclick="verItemVenda('<?php echo $venda['idvenda'];?>')">Ver itens</a></td>
                            <td><?php echo $status; ?></td>
                            <?php
                                switch($venda['statusvenda']){
                                    case 1: case 2: 
                            ?>
                                        <td><a data-toggle="modal" data-target="#modalStatusVenda" class="btn btn-info" onclick="enviarIdVenda('<?php echo $venda['idvenda'];?>')">Mudar Status</a></td>
                            <?php
                                        break;
                                    case 3: case 4: case 5: echo("<td></td>"); break;                                    
                                }
                            ?>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                

            </div>
        </div>
    </div>

    <!-- MODAL MUDANÇA DE STATUS DA VENDA -->
    <div class="modal fade" id="modalStatusVenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar Status da Venda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="mudar-status-venda.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            IdVenda: 
                            <input type="text" id="idvendaModal" name="idvendaModal" readonly>
                            <br>
                            Status da venda:
                            <select id="status" name="status" class="form-control">
                                <!-- <option value="1">Pedido pelo cliente</option> -->
                                <option value="2">Confirmado pela loja</option>
                                <!-- <option value="3">Cancelado pelo cliente</option> -->
                                <option value="4">Cancelado pela loja – falta de estoque</option>
                                <option value="5">Venda finalizada – produtos enviados</option>
                            </select>
                        </div>
                    </div>
                    
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Alterar">
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- MODAL VER ITENS DA VENDA -->
    <div class="modal fade" id="modalItensVenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver itens da Venda: <div id="idvenda"></div></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Qtde.</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($listaitens as $item){ 
                                if ($item['idvenda'] == 12){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $item['idvenda']; ?></th>
                                        <td><?php echo $item['idproduto']; ?></td>
                                        <td><?php echo $item['qtdeitemvenda']; ?></td>
                                        <td><?php echo $item['subtotalitemvenda']; ?></td>
                                    </tr>
                        <?php   } 
                             }
                        ?>
                    </tbody>
                </table>
                    
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>

    </div>

    <!--SCRIPTS DE TODO SITE-->   

    <script>
        const btn = document.querySelector('#btn');
        const bxSearch = document.querySelector('.bx-search');
        const sidebar = document.querySelector('.sidebar');
        const home = document.querySelector('.homeContent');

        btn.addEventListener('click',()=>{
            sidebar.classList.toggle('active');
            home.classList.toggle('active');
        });
    </script>

    <!--LINK PARA OS ICONS--> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <!--LINK PARA CODIGOS PROF--> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        function monetario(){
            atual = document.getElementById('inputPreco');
            var f = atual.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
            document.getElementById('inputPreco').value(f);
        }

        function readImage() {
            if (this.files && this.files[0]) {
                var file = new FileReader();
                file.onload = function(e) {
                    document.getElementById("preview").src = e.target.result;
                };       
                file.readAsDataURL(this.files[0]);
            }
        }
        document.getElementById("foto").addEventListener("change", readImage, false);
        
        function enviarIdVenda(valor) {
            document.getElementById('idvendaModal').value = valor;
        }

        function verItemVenda(valor){
            document.getElementById('idvenda').innerHTML = valor;
            
        }
    </script>
        
    </body>
 </html>