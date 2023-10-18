<?php 
    include 'conexao.php';


    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];
    $end = $_POST['txtendereco'];
    $cidade = $_POST['txtcidade'];
    $cep = $_POST['txtcep'];

    $consulta = $cn->query("select dsEmail from tbUsuario where dsEmail = '$email'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

    if($consulta->rowCount() == 1){
        header('location:erro1.php');
    }else{
        $incluir = $cn->query("insert into tbUsuario(NomeUsu, dsEmail, dsSenha, dsStatus, dsEndereco, dsCidade, numCep) values ('$nome','$email','$senha','0','$end','$cidade','$cep')");
        header('location:ok.php');
    }

?>