<?Php
  require_once('../conex.php');
  header("Access-Control-Allow-Origin: *");


  if (isset($_GET['cpf']) && isset($_GET['status']) && isset($_GET['date'])) {
    $cpf = mysqli_real_escape_string($conectar, trim($_GET['cpf']));
    $status = mysqli_real_escape_string($conectar, trim($_GET['status']));
    $date = mysqli_real_escape_string($conectar, trim($_GET['date']));

    $formatDate = strtotime($date);
    echo var_dump($formatDate);
    $query1 = "SELECT id FROM users WHERE cpf = '$cpf';";

    $result1 = mysqli_query($conectar, $query1);
    $user = mysqli_fetch_assoc($result1);
    $userId = $user['id'];

    $query2 = "INSERT INTO scheduling (userId, status, date)
      VALUES ('$userId', '$status', $formatDate);";
    
    $result2 = mysqli_query($conectar, $query2);
    
    // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $data = ["status" => $status, "date" => $date, "userId" => $userId];
    if($result2) echo json_encode($data);
  }
