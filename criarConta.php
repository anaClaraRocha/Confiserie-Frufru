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

        <script src="./js/apiCep.js" type='module' defer></script>

        <title>Confiserie Frufru</title>
        <link rel="icon" href="images/iconeLogo.png">
    </head>
    <body>

    <div class="container">
        <div class="form-image">
           <img src="images/LogoLogin02.png" alt="IMG">
        </div>
        <div class="form">
            <form action="cadastra-cliente.php" method="post">

                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="login.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu Nome" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf" method="post" action="validaCpf.php">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" required>
                    </div>

                    

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu E-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="cep">CEP</label>
                        <input id="cep" type="text" name="cep" placeholder="Digite seu CEP" required>
                    </div>

                    <div class="input-box">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" type="text" name="cidade" placeholder="Digite sua Cidade" required>
                    </div>

                    <div class="input-box">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" type="text" name="bairro" placeholder="Digite seu Bairro" required>
                    </div>

                    <div class="input-box">
                        <label for="estado">Estado</label>
                        <input id="estado" type="text" name="estado" placeholder="Digite seu Bairro" required>
                    </div>

                    <div class="input-box">
                        <label for="endereco" >Rua</label>
                        <input id="endereco"  type="text" name="rua" placeholder="Digite a sua Rua" required>
                    </div>

                    <div class="input-box">
                        <label for="complemento">Complemento</label>
                        <input id="complemento" type="text" name="complemento" placeholder="Digite o complemento" >
                    </div>

                    <div class="input-box">
                        <label for="numero">N°</label>
                        <input id="numero" type="text" name="numero" placeholder="Digite seu N°" required>
                    </div>
                    
                    <div class="input-box">
                        <label for="Password">Senha</label>
                        <input id="Password" type="password" name="senha" placeholder="Digite sua Senha" required>
                    </div>

                    <div class="input-box">
                        <label for="confirmPassword">Confirmar Senha</label>
                        <input id="confirmPassword" type="password" name="ConfimarSenha" placeholder="Confirme a sua Senha" required>
                    </div>

                </div>

                <div class="continue-button">
                    <button action="cadastra-cliente.php">Cadastrar</button>
                </div>

            </form>
        </div>
    </div>
           


    <script src="js/main.js"></script>
        

    </body>
</html>