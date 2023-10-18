<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      .navbar{ margin-bottom: 0; }
    </style>
</head>
<body style="background-color: #9D6D6E">
    <?php
        session_start();
        include 'conexao.php';
        include 'nav.php';
        include 'cabecalho.html';
    ?>

    <div class="container-fluid">
        <div class="row" style="color:aliceblue">
            <div class="col-sm-4 col-sm-offset-4">
                <h2>Logon de Usuário</h2>
                <form name="frmusuario" method="post" action="validausuario.php">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="txtemail" type="email" class="form-control" required id="email"/>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input name="txtsenha" type="password" class="form-control" required id="senha"/>
                    </div>
                    <button type="submit" class="btn btn-lg btn-default" style="background-color: #436436; color:aliceblue; margin:5px">
                        <span class="glyphicon glyphicon-ok"> Entrar</span>
                    </button>

                    <a href="formusuario.php">
                    <button type="button" class="btn btn-lg btn-link" style="background-color: #566E3D; color:aliceblue"> Ainda não sou cadastrado </button>
                    </a>

                </form>
            </div>
        </div>
    </div>
    
    <?php include 'rodape.html'; ?>

</body>
</html>