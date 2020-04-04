<?php
session_start();
require("conex.php");

if(empty($_POST['txtuser']) || empty($_POST['txtpass'])) {
    echo "Os campos não podem estar em branco";
    header('location: dashbord.php?file=cadastrar_usuario');
    exit();
}

$novo_usuario = mysqli_real_escape_string($conectar, trim($_POST['txtuser']));
$nova_senha = mysqli_real_escape_string($conectar, trim($_POST['txtpass']));

$query = "INSERT INTO sys_usuario (usu_usuario, usu_senha)
         VALUES
         ('$novo_usuario'
         ,'$nova_senha')";

$result = mysqli_query($conectar, $query);

echo "Usuário cadastrado com sucesso!";
?>