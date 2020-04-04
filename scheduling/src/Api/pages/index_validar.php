<?php
session_start();
include('conex.php');

if(empty($_POST['txtUsuario']) || empty($_POST['txtSenha'])) { 
	header('location: index.php');
	exit();
}

// O comando mysqli_real_scape_string serve para evitar injeção de sql  
$usuario = mysqli_real_escape_string($conectar, $_POST['txtUsuario']);
$senha = mysqli_real_escape_string($conectar, $_POST['txtSenha']);

$query = "SELECT id_usuario, usu_usuario FROM sys_usuario WHERE usu_usuario = '{$usuario}' AND usu_senha = '{$senha}'";

$result = mysqli_query($conectar, $query);

$row = mysqli_num_rows($result);


// Agora será montada a lógica para verificar se usuario e senha estão corretos

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('location: dashbord.php?file=cadastrar_usuario');
	exit();
} else {
	$_SESSION['unauthorized'] = true;
    header('location: ../index.php');
	exit();
}

    /*
    if (!isset($_SESSION)):
        session_start();
        $_SESSION["logado"] = 0;
    endif;

    require("conex.php");

    $pdo = abrirBanco();

    $txtUsuario = trim($_POST["txtUsuario"]);
    $txtSenha = trim($_POST["txtSenha"]);

    $compararDados = $pdo->prepare ("SELECT usu_usuario , usu_senha 
        FROM  sys_usuario
        WHERE usu_usuario = ? AND  usu_senha = ?");

    $compararDados->bindValue(1, $txtUsuario);
    $compararDados->bindValue(2, $txtSenha);
    $compararDados->execute();

    $validacao = $compararDados->fetchObject();

    if($validacao) {
        $_SESSION["logado"] = 1;
        $id_user = $validacao->usu_usuario;
        $_SESSION["usu_usuario"] = $id_user;
        $_SESSION["nome_usuario"] = $pegarUsuario;
        echo "<script type='text/javascript'> location.href='dashbord.php'</script>";
    } else {
        echo "AINDA NÃO DEU CERTO";
    }*/
?>