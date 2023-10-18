<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="
		Titulo: Loja de Canecas
		Autor: Daniel Biondi
		Data:16/06/2023
	"/>
    <link rel="shortcut icon" href="img/icone.png"/>
    <title>Loja de Canecas :D</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      .navbar{ margin-bottom: 0; }
    </style>
</head>
    
<body style="background-color: #9D6D6E">
  <?php

  session_start();  
  include 'conexao.php';
  include 'nav.php';
  include 'cabecalho.html';
  
  
  $consulta = $cn->query('select CodCaneca, DescCaneca, Preco, ImageCaneca, QtdEstoque from vwCaneca');
  ?>

  <div class="container-fluid">
    <div class="row" style="color:aliceblue">
      <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
      <div class="col-sm-3">
        <div style="background-color:#784B4B; border-radius:10px 10px 10px 10px; padding:5px; margin:10px; margin-bottom:40px; box-shadow: 0px 0px 5px black">
        <img src="imagens/<?php echo $exibe['ImageCaneca']; ?>" class="img-responsive" style="width:100%; border-radius:10px 10px 10px 10px">
        <div><h4 style="font-size: 15px"><b><?php echo mb_strimwidth ($exibe['DescCaneca'],0,20,'...'); ?></b></h4></div>
        <div><h5>R$<?php echo number_format($exibe['Preco'],2,',','.'); ?></h5></div>

        <div class="text-center">
          <a href="detalhes.php?cd=<?php echo $exibe['CodCaneca'];?>">
          <button class="btn btn-lg btn-block btn-default">
            <span class="glyphicon glyphicon-info-sign" style="color:saddlebrown"> Detalhes</span>
          </button>
          </a>
        </div>


        
        <div class="text-center" style="margin-top:5px; margin-bottom:5px">
        <?php if($exibe['QtdEstoque'] > 0) { ?>

          <button class="btn btn-lg btn-block btn-warning">
            <span class="glyphicon glyphicon-usd"> Comprar</span>
          </button>

        <?php } else { ?>


          <button class="btn btn-lg btn-block btn-danger" disabled>
            <span class="glyphicon glyphicon-remove-circle"> Indisponivel</span>
          </button>

          <?php } ?>

        </div>
        </div>
      </div>
        <?php } ?>

    </div> <!--fechamento da class row-->
  </div> <!--Fechamento do container fluid-->
  <?php
    include 'rodape.html';
  ?>

</body>
</html>