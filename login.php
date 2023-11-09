<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link type="text/css" rel="stylesheet" href="css/estiloFromulario.css">

        <link rel='stylesheet' href='css/owl.carousel.min.css'>
        <link rel='stylesheet' href='css/owl.theme.default.min.css'>

        <title>Confiserie Frufru</title>
        <link rel="icon" href="images/iconeLogo.png">
    </head>
    <body>
           
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>

                <div class="container-login100-form-btn">
						<a href="index.php"><button href="index.php" class="login100-form-btn">
							Voltar
						</button></a>
					</div>

					<img src="images/LogoLogin02.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="valida-login-cliente.php">
					<span class="login100-form-title">Confiserie Frufru </span>

					<div class="wrap-input100 ">
						<input class="input100" type="text" name="txtlogin" placeholder="Login">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 " >
						<input class="input100" type="password" name="txtsenha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<br>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" method="post" action="valida-login-cliente.php">
							Login
						</button>
					</div>
<br>
					
					<center><div class="text-center p-t-136">
						<a class="txt2" href="criarConta.php">Crie sua conta <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div></center>
				</form>
			</div>
		</div> 
	</div>


    <script src="js/main.js"></script>
        

    </body>
</html>