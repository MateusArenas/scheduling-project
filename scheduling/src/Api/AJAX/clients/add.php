<?Php
  require_once('../conex.php');
  header("Access-Control-Allow-Origin: *");


  if (isset($_GET['name']) && isset($_GET['rg']) && isset($_GET['cpf'])) {
    $name = mysqli_real_escape_string($conectar, trim($_GET['name']));
    $rg = mysqli_real_escape_string($conectar, trim($_GET['rg']));
    $cpf = mysqli_real_escape_string($conectar, trim($_GET['cpf']));
    $query = "INSERT INTO users (name, rg, cpf)
      VALUES ('$name', '$rg', $cpf);";
    
    $result = mysqli_query($conectar, $query);
    
    // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $data = ["rg" => $rg, "cpf" => $cpf, "name" => $name];
    if($result) echo json_encode($data);
  }
