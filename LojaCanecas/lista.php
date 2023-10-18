<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
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
	
// se a sessão id estiver vazia ou se a sessão estatus for diferente de adm entao execute
	if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1){
			header('location:index.php');  // redireciona para página index.php
	}
	
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	
	$consulta = $cn->query("SELECT * from tbCaneca");
	
	
	?>
	
<div class="container-fluid">
	
	
	<?php while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
	?>
	
	
	<div class="row" style="margin-top: 15px; color:aliceblue;">
		
		<div class="col-sm-1 col-sm-offset-1"><img src="Imagens/<?php echo $exibe['ImageCaneca']; ?>" class="img-responsive" style="border-radius:10px 10px 10px 10px"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibe['DescCaneca']; ?></h4></div>
		<div class="col-sm-2" style="padding-top:20px">
		
			
		<a href="frmAlterar.php?id=<?php echo $exibe['CodCaneca'];?>&id2=<?php echo $exibe['CodCategoria'];?>&id3=<?php echo $exibe['CodFornecedor'];?>">
		<button class="btn btn-lg btn-block btn-default" style="background-color:#031D44; color:aliceblue">
		<span class="glyphicon glyphicon-pencil"> Alterar</span>
		</button>
		</a>
		</div>
		
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
		<a href="excluir.php?id=<?php echo $exibe['CodCaneca']; ?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span class="glyphicon glyphicon-remove"> Excluir</span>		
		</button>
		</a>
		
		
		</div> 
				
	</div>		
	
	
	<?php } ?>
	

	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>