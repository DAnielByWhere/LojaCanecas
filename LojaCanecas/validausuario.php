<?php
include 'conexao.php';

session_start(); //iniciando uma sessão

$Vemail = $_POST['txtemail'];
$Vsenha = $_POST['txtsenha'];


/*echo $Vemail.'<br>';
echo $Vsenha.'<br>';
*/

$consulta = $cn->query("SELECT CodUsu, NomeUsu, dsEmail, dsSenha, dsStatus FROM tbUsuario WHERE dsEmail = '$Vemail' AND dsSenha = '$Vsenha'");

if($consulta->rowCount() == 1){

    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if($exibeUsuario['dsStatus'] == 0){
        $_SESSION['ID'] = $exibeUsuario['CodUsu'];
        $_SESSION['Status'] = 0;
        header('location:index.php');
    }else{
        $_SESSION['ID'] = $exibeUsuario['CodUsu'];
        $_SESSION['Status'] = 1;
        header('location:index.php');
    }

}else{

    header('location:erro.php');

}

?>