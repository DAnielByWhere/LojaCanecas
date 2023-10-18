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
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

	if(!empty($_GET['cd'])) { //se não estiver vazia a variavel cd

	$cd_caneca = $_GET['cd'];

	$consulta = $cn->query("select * from vwCaneca where CodCaneca = '$cd_caneca'");
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	
	}else{
		header("location:index.php");
	}

	?>
	
<div class="container-fluid">
	
	
	
	<div class="row" style="color:aliceblue">
		
		 <div class="col-sm-4 col-sm-offset-1">
			 
			 <h1><b>Detalhes do Produto</b></h1>
			 
			 <img src="imagens/<?php echo $exibe['ImageCaneca']; ?>" class="img-responsive" style="width:100%;">
		
				<div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div>
				<div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div>
			
		</div>
		
				
 		 <div class="col-sm-7"><h1><b><?php echo $exibe['DescCaneca'] ?></b></h1>
		
		<p><?php echo $exibe['DescCaneca']; ?></p>
		
		<p>Capacidade: <?php echo $exibe['Capacidade']; ?></p>
		
		<p><b>Preço</b> R$<?php echo number_format($exibe['Preco'],2,',','.'); ?></p>

		<p>Categoria: <b><?php echo $exibe['DescCategoria']; ?></b></p>
			 
		<p>Fornecedor: <b><?php echo $exibe['Nome']; ?></b></p>
			 
		<button class="btn btn-lg btn-success" style="width:10em">Comprar</button>
				
		</div>		
	

	
</div>
	
	<?php
	
	include 'rodape.html';
	
	?>
	
</body>
</html>