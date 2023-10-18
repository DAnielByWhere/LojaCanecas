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
	
	
	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});
$("#isbn").mask('000-00-000-0000-0');
	
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

	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

    $consultaCat = $cn->query("select * from tbCategorias"); 
    $consultaFornecedor = $cn->query("select * from tbFornecedor"); 
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row" style="color:aliceblue">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Inclusão de Canecas</h2>
				
				<form method="post" action="insprod.php" name="incluiProd" enctype="multipart/form-data">
					
					<div class="form-group">					
					
					<label for="sltcat">Categoria</label>
					
					<select class="form-control" name="sltcat">
					  <option value="">Selecione</option>
                      <?php while($listaCat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
					  <option value="<?php echo $listaCat['CodCategoria'];?>"><?php echo $listaCat['DescCategoria'];?></option>
                      <?php } ?>					
					</select>
			
					</div>
					
					<div class="form-group">
				
						<label for="txtcaneca">Nome da Caneca</label>
						<input name="txtcaneca" type="text" class="form-control" required id="txtcaneca">
					</div>
				
				    <div class="form-group">
					<label for="sltfornecedor">Fornecedor</label>
					
					<select class="form-control" name="sltfornecedor">
					  <option value="">Selecione</option>
					  <?php while($listaForn = $consultaFornecedor->fetch(PDO::FETCH_ASSOC)) { ?>
					  <option value="<?php echo $listaForn['CodFornecedor'];?>"><?php echo $listaForn['Nome'];?></option>
                      <?php } ?>
					</select>
					
					</div>					
					
					<div class="form-group">
				
					<label for="txtcapacidade">Capacidade</label>
					
					<input type="number" class="form-control" name="txtcapacidade" required id="txtcapacidade">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtpreco">Preço</label>
					
					<input type="text" class="form-control"  name="txtpreco"  required id="txtpreco">

					</div>
					
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" required id="txtqtde">

					</div>				
					
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto Principal</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">

					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">
					  <option value="">Selecione</option>
					  <option value="S">Sim</option>
					  <option value="N">Não</option>					  
					</select>
						

					</div>
					
							
				<button type="submit" class="btn btn-lg btn-default" style="background-color: #436436; color:aliceblue;">
					
					<span class="glyphicon glyphicon-pencil"> Cadastrar </span>
					
				</button>
				
				</form>
				
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>