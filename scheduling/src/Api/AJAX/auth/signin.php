<?Php
  require_once('../conex.php');
  header("Access-Control-Allow-Origin: *");
  header("Content-Type': 'application/json");

if (isset($_GET['username']) && isset($_GET['password'])) {
  function login($conectar)
  {
    $username = mysqli_real_escape_string($conectar, trim($_GET['username']));
    $password = mysqli_real_escape_string($conectar, trim($_GET['password']));
    $sql = "SELECT name, password FROM `users`
      WHERE name='$username' AND password='$password'";
    $res = mysqli_query($conectar, $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
  }

  echo json_encode(login($conectar));
}
?>