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
    <link type="text/css" rel="stylesheet" href="../css/estiloAdmForm.css">
    
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

        <?php
                    require_once '../dao/ClienteDao.php';
                    
                    try {
                        $listaCliente = clienteDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
    
     <!-- TABELA -->

     <div class="form-header">
                    <div class="title">
                        <h1>Clientes Cadastradas</h1>
                    </div>
                </div>

        <div class="container">
        <table class="fl-table">
            <thead>
                <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>		
                <th>CEP</th>
                <th>Rua</th>
                <th>N°</th>
                <th>Bairro</th>
                <th>Estado</th>
                <th>Complemento</th>
            </tr>

            </thead>
            <tbody>
               
            <?php for ($i = 0; $i < count(clienteDao::listar()); $i++) {
                print("
            <tr>
                <td> " . clienteDao::listar()[$i][0] . " </td>
                <td> " . clienteDao::listar()[$i][1] . " </td>
                <td> " . clienteDao::listar()[$i][2] . " </td>
                <td>" . clienteDao::listar()[$i][3] . "</td>
                <td>" . clienteDao::listar()[$i][11] . "</td>
                <td>" . clienteDao::listar()[$i][5] . "</td>
                <td>" . clienteDao::listar()[$i][6] . "</td>
                <td>" . clienteDao::listar()[$i][8] . "</td>
                <td>" . clienteDao::listar()[$i][9] . "</td>
                <td>" . clienteDao::listar()[$i][7] . "</td>
            </tr>
            ");
            }?>


                <tbody>
        </table>
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
        
    </body>
 </html>