<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Logon de usuário</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
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
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				
				<h2>Email já em uso na Loja!!!</h2>
				
				<a href="formusuario.php" class="btn btn-block btn-default" role="button" style="color:#566E3D">Tentar Novamente</a>
				
				<a href="esquecisenha.php" class="btn btn-block btn-warning" role="button">Esqueci a senha</a>
				
							
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>