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
                    require_once 'global.php';
                    try {
                        $clienteCadastrados = ClienteDao::clienteCadastrados();
                        $vendaMCara = VendaDao::maiorVenda();
                        $gastou = VendaDao::clienteMaisComprou();
                    } 
                    catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
        
        <div class="container">
            <div class="overview">
                <div class="title">
                    <ion-icon name="speedometer"></ion-icon>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">

                    <div class="box box1">
                    <ion-icon name="person-outline"></ion-icon>
                        <span class="text">Quantidade Clientes cadastrado</span>
                        <span class="number"><?php echo $clienteCadastrados; ?> clientes</span>
                    </div>
                    
                    <div class="box box2">
                        <ion-icon name="cash-outline"></ion-icon>
                        <span class="text">Venda Mais Cara</span>
                        <span class="number"><?php echo $vendaMCara; ?> reais</span>
                    </div>
                    
                    <div class="box box3">
                        <ion-icon name="happy-outline"></ion-icon>
                        <span class="text">Cliente que Mais Gastou</span>
                        <span class="number"> <?php echo $gastou; ?></span>
                    </div>

                </div>
            </div>
            <br>
            <center><h1>Produtos mais Vendidos</h1></center>

            <div class="container">
            <div id="chartdiv"></div>
            </div>

    </section>
        </h2>

    </div>

    <!--SCRIPTS DE TODO SITE-->   
    
    <!--PIZZA--> 

            <script>
        am5.ready(function() {

        var root = am5.Root.new("chartdiv");

        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            endAngle: 270
        })
        );

        var series = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: "value",
            categoryField: "category",
            endAngle: 270
        })
        );

        series.states.create("hidden", {
        endAngle: -90
        });

        series.data.setAll([{
        category: "Bolo",
        value: 501.9
        }, {
        category: "Churros",
        value: 301.9
        }, {
        category: "Cones Trufados",
        value: 201.1
        }, {
        category: "Cappuccino",
        value: 165.8
        }, {
        category: "Croissant",
        value: 139.9
        }, {
        category: "Docinhos",
        value: 128.3
        }, {
        category: "Sucos",
        value: 99
        }]);

        series.appear(1000, 100);

        });
        </script>

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