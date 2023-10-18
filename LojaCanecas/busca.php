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

	if(empty($_GET['txtbuscar'])){
		echo "<html><script>location.href='index.php'</script></html>";
	}

    $pesquisa = $_GET['txtbuscar'];
    $consulta = $cn->query("select * from  vwCaneca where DescCaneca like concat('%', '$pesquisa', '%') or Nome like concat('%', '$pesquisa', '%')");
	
	if($consulta->rowCount() == 0){
		echo "<html><script>location.href='erro2.php'</script></html>";
	}

	?>
	
<div class="container-fluid">
	
	
	
	<?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {?>
	<div class="row" style="margin-top: 15px; color:aliceblue">
		
		<div class="col-sm-1 col-sm-offset-1"><img style="border-radius:10px 10px 10px 10px" src="imagens/<?php echo $exibe['ImageCaneca']; ?>" class="img-responsive"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><b><?php echo mb_strimwidth ($exibe['DescCaneca'],0,20,'...'); ?></b></h4></div>
		<div class="col-sm-2"><h4 style="padding-top:20px">Preço: R$<?php echo number_format($exibe['Preco'],2,',','.'); ?></h4></div>
		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
        
    <a href="detalhes.php?cd=<?php echo $exibe['CodCaneca'];?>">
        <button class="btn btn-lg btn-block btn-default">	
		<span class="glyphicon glyphicon-info-sign" style="color:saddlebrown"> Detalhes</span>		
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