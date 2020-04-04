<?php
require_once('conex.php');
// if(empty($_GET['txtUsuario']) || empty($_POST['txtSenha'])) {
  header("Access-Control-Allow-Origin: *");
$data = [];

if (isset($_GET['users'])) {
  $table = $_GET['users'];

  // $query = "SELECT id_usuario, usu_usuario FROM '{$table}' WHERE usu_usuario = '{$usuario}' AND usu_senha = '{$senha}'";

  // $result = mysqli_query($conectar, $query);
  // $row = mysqli_num_rows($result);
  // if($row == 1) {
  //   array_push($data, ['users']);
  //   exit();
  // }
  array_push($data, ['id' => 0, 'name' => 'Mateus Arenas Gioio', 'cpf' => 449922171848, 'rg' => 324234234, 'status' => 'em andamento', 'date' => '10/20/20']);
  array_push($data, ['id' => 1, 'name' => 'Mateus Arenas Gioio', 'cpf' => 449922171848, 'rg' => 324234234, 'status' => 'em andamento', 'date' => '10/20/20']);
}

  echo json_encode($data);
?>