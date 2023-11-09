<?php include_once 'verifica-logado-cliente.php'; ?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="pt-br"> 
  
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- LINKS PARA FONTES-->

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CLato%7CKalam:300,400,700%7CGreat+Vibes">
    
    <!-- LINKS PARA CSS -->
    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/styleCliente.css">
    <link rel="stylesheet" href="../css/estiloAreaCliente.css">

    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>

    <title>Área do Cliente</title>

    <link rel="icon" href="../images/iconeLogo.png">

  </head>

  <body>
   
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-bell">
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
          <div class="cssload-circle">
            <div class="cssload-inner"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="page">

    <header class="section page-header">

            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="100px" data-xl-stick-up-offset="120px" data-xxl-stick-up-offset="140px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                        <div class="rd-navbar-aside-outer">
                            <div class="rd-navbar-aside">
                                <div class="rd-navbar-collapse">
                                    <div class="contacts-ruth"></div>
                                </div>
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand">
                                    <a class="brand" href="../index.php"><img class="brand-logo-dark" src="../images/logoCliente.png"/><img class="brand-logo-light" src="images/WhatsApp Image 2022-10-08 at 19.36.23.jpeg" alt="" width="100%" height="100%" srcset="images/logo-inverse-231x49.png 2x"/></a>
                                </div>
                            </div>
                            <div class="rd-navbar-button"></div>
                        </div>
                    </div>
    
                    <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                
                    <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li class="rd-nav-item"><a class="rd-nav-link" href="index-cliente.php">Home</a></li>
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="produtos-cliente.php">Produtos</a>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="compras-cliente.php">Minhas Compras</a></li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="contato-cliente.php">Contato</a> </li>
                    </ul>
                    </div>

                    <div class="rd-navbar-main-element">

                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search rd-navbar-search-3">
                        <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                        <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                        <div class="form-wrap">
                            <label class="form-label" for="rd-navbar-search-form-input">Procurar...</label>
                            <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off"/>
                            <div class="rd-search-results-live" id="rd-search-results-live"></div>
                            <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                        </div>
                        </form>
                    </div>

                    <?php
                            if (isset($_COOKIE["carrinho"])){
                                $carrinhorecebido =  $_COOKIE["carrinho"]; 
                                $carrinhoAtual = unserialize($carrinhorecebido);
                                $qtdecarrinho = count($carrinhoAtual);
                            }
                            else{
                                $qtdecarrinho = 0;
                            }
                        ?>
                
                    <!-- CARRINHO DE COMPRA -->  
                    <div class="rd-navbar-basket-wrap">
                       <!-- <button class="rd-navbar-basket fl-bigmug-line-shopping202"><a href="ver-carrinho.php"><?php echo $qtdecarrinho;?></a> </button> -->       
                        <div> <a href="ver-carrinho.php"></a><button class="rd-navbar-basket fl-bigmug-line-shopping202"><a href="ver-carrinho.php"><span><?php echo $qtdecarrinho;?></span></a></div></button>
                      </div>    
                   
                     <!-- SAIR LOGOUT -->
                    <div class="rd-navbar-basket-wrap">
                        <button class="rd-navbar-basket"><a href="logout.php"> <i class='bx bx-log-out' id="logout"></i></a></button> 
                    </div>
                    </div>
                    </div>
                </nav>
            </div>
        </header>
      
  <br>

  <h2>Nossos Docinhos</h2>

  <br>
  
  <?php
            require_once 'global.php';
            try {
                $listaproduto = ProdutoDao::listar();
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }
        ?>
  <br> <br>
  <br>

  <center>     
              <div class="row row-30 row-lg-50">
              <?php foreach($listaproduto as $produto){ ?>
                <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                  <!-- Product-->
                  <article class="product">
                    <div class="product-body">
                      <div class="product-figure"> <img class="card-img-top" width="150px" src="../<?php echo $produto['imgproduto']; ?>" alt="<?php echo $produto['nomeproduto']; ?>">
                      </div>
                      <h5 class="titulo"><?php echo $produto['nomeproduto']; ?></h5>
                      <div class="product-price-wrap">
                        <p class="card-text">R$ <?php echo $produto['precoproduto']; ?></p>
                      </div>
                    
                    </div>
                    
                    <div class="product-button-wrap">
                      <div class="product-button"><a class="button button-primary-2 button-zakaria fl-bigmug-line-shopping202" href="produto-carrinho.php?idproduto=<?php echo $produto['idproduto']; ?>"></a></div>
                    </div>
                    
                  </article>
                </div>
                <?php } ?>

                
                 
              <!--<div class="pagination-wrap">
                
                <nav aria-label="Navegação na página" _mstaria-label="417989">
                  <ul class="pagination">
                    <li class="page-item page-item-control disabled" _msthidden="1"><a class="page-link" href="#" aria-label="Previous" _msthidden="A" _msthiddenattr="2784093" _mstaria-label="119327"><span class="icon" aria-hidden="true"></span></a></li>
                    <li class="page-item active"><span class="page-link" _msthash="3197220" _msttexthash="4459">1</span></li>
                    <li class="page-item"><a class="page-link" href="#" _msthash="2941705" _msttexthash="4550">2</a></li>
                    <li class="page-item"><a class="page-link" href="#" _msthash="2941887" _msttexthash="4641">3</a></li>
                    <li class="page-item page-item-control"><a class="page-link" href="#" aria-label="Próximo" _mstaria-label="113945"><span class="icon" aria-hidden="true"></span></a></li>
                  </ul>
                </nav>
              </div>
            </div>-->
            </center>

            <br><br><br>
        
    <!--RODAPE-->
    <div class="footer-modern-panel text-center">
      <div class="container">
        <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Copyright | Confiserie Frufru</span><span>.&nbsp;</span><span></span><span>&nbsp;</span><a href="#"></a></p>
      </div>
    </div>
    
    <div class="snackbars" id="form-output-global"></div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>

  </body>
</html>