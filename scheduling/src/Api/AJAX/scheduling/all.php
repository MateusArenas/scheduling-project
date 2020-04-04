<?Php
  require_once('../conex.php');
  header("Access-Control-Allow-Origin: *");
  header("Content-Type': 'application/json");

function get_scheduling($conectar)
{
  $sql = "SELECT * FROM `scheduling`";
  $res = mysqli_query($conectar, $sql);
  return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_combine($conectar)
{
  $sql = 'SELECT a.id, a.status, a.date, a.userId, a.updateAt, a.createAt, b.name, b.cpf, b.rg FROM `scheduling` a,`users` b WHERE a.userId = b.id';
  $res = mysqli_query($conectar, $sql);
  return mysqli_fetch_all($res, MYSQLI_ASSOC);
}



  echo json_encode(get_combine($conectar));
?>