<!doctype html>
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
	
<script src="jquery.mask.js"></script>

<script>
	
	
/* mscara para o preço */	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});	
	
});
	
</script>
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
</style>
	
	
	
	
</head>

<body style="background-color: #9D6D6E">
	
<?php
	
	
	session_start();	
	
	if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1){
        header('location:index.php');
    }
	
	$cd = $_GET['id'];
	$cd2 = $_GET['id2'];
	$cd3 = $_GET['id3'];
	
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
	
	$consulta = $cn->query("SELECT * FROM tbCaneca WHERE CodCaneca='$cd'");	
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	
	$consultaCat = $cn->query("SELECT CodCategoria, DescCategoria FROM tbCategorias where CodCategoria='$cd2' union select CodCategoria, DescCategoria FROM tbCategorias where CodCategoria !='$cd2'");
	
	$consultaAutor = $cn->query("SELECT CodFornecedor, Nome FROM tbFornecedor where CodFornecedor='$cd3' union select CodFornecedor, Nome FROM tbFornecedor where CodFornecedor !='$cd3'");
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row" style="color:aliceblue">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de produto</h2>
				
				<form method="post" action="alterarProduto.php?cd_altera=<?php echo $cd?>" name="incluiProd" enctype="multipart/form-data">
				
					<div class="form-group">					

						<label for="sltcat">Categoria</label>

						<select class="form-control" name="sltcat">
							<?php					
								while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibecat['CodCategoria'];?>"><?php echo $exibecat['DescCategoria'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
				
						<label for="txtcaneca">Nome da Caneca</label>
						<input type="text" name="txtcaneca" value="<?php echo $exibe['DescCaneca']; ?>"  class="form-control" required id="txtcaneca">
					</div>
					
					<div class="form-group">					

						<label for="sltfornecedor">Fornecedor</label>

						<select class="form-control" name="sltfornecedor">
							<?php					
								while($exibeautor = $consultaAutor->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibeautor['CodFornecedor'];?>"><?php echo $exibeautor['Nome'];?></option>;
							<?php }	?>	
						</select>
					</div>
		
					
					<div class="form-group">
				
					<label for="txtcapacidade">Capacidade</label>
					
					<input type="number" class="form-control" value="<?php echo $exibe['Capacidade']; ?>" name="txtcapacidade" required id="txtcapacidade">

					</div>
					
					<div class="form-group">
				
					<label for="preco">Preço</label>
					
					<input type="text" class="form-control" required name="txtpreco" value="<?php echo $exibe['Preco']; ?>" id="preco">

					</div>
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" value="<?php echo $exibe['QtdEstoque']; ?>" required id="txtqtde">

					</div>
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="Imagens/*" class="form-control" name="txtfoto1" id="foto1">

					</div>
					
					<div class="form-group">
						
					<img src="Imagens/<?php echo $exibe['ImageCaneca']; ?>" width="100px" >
						
					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">					  				
					<!-- se o sg_lancamento == S este valor estará selecionado senão vazio -->
					<option value="S" <?=($exibe['SgLancamento'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['SgLancamento'] == 'N')?'selected':''?>>Não</option>	  
					</select>
						

					</div>
						
					<button type="submit" class="btn btn-lg btn-default" style="background-color:#031D44; color:aliceblue">
					
					<span class="glyphicon glyphicon-pencil"> Alterar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
</body>
</html>