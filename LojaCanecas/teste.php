<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'conexao.php';
    $consulta = $cn->query('select * from vwCaneca');
    while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){

    echo $exibe['DescCaneca'].'<br>';
    echo $exibe['Preco'].'<br>';
    echo $exibe['DescCategoria'].'<br>';
    echo '<hr>';

    }
?>
</body>
</html>