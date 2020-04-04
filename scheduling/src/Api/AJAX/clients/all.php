<?Php
  require_once('../conex.php');
  header("Access-Control-Allow-Origin: *");
  header("Content-Type': 'application/json");

function get_users($conectar)
{
  $sql = "SELECT name, cpf, rg, id, createAt, updateAt FROM `users`";
  $res = mysqli_query($conectar, $sql);
  return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

  echo json_encode(get_users($conectar));
?>