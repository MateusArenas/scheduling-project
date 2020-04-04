<?Php
  require_once('../conex.php');
  header("Access-Control-Allow-Origin: *");

  $data = [];
  if (isset($_GET['id']) && isset($_POST['status'])) {
    $status = mysqli_real_escape_string($conectar, trim($_POST['status']));
    $id = mysqli_real_escape_string($conectar, trim($_GET["id"]));

      $query = "UPDATE scheduling
      SET status='$status'
      WHERE id='$id';";
    
      $result = mysqli_query($conectar, $query);
      $row = mysqli_num_rows($result);
      if($row == 1) {
        $data = $result;
        exit();
      }
  }
  echo json_encode($data);
