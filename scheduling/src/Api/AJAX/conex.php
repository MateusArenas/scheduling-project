<?php
//pega o arquivo de configuração do db
$strJsonDB_config = file_get_contents("db_config.json", true);

//transforma em um array
$arrayDB_config = json_decode($strJsonDB_config, true);

$whitelist = array('127.0.0.1', "::1");
$is_localhost = in_array($_SERVER['REMOTE_ADDR'], $whitelist);//verifica se está no localhost

//pega os parametros especificos de cada ambiente
$db_ambient_config = $is_localhost ? $arrayDB_config['dev'] : $arrayDB_config['prod'];

//seta os valores...
define('HOST', $db_ambient_config['HOST']);
define('USUARIO', $db_ambient_config['USUARIO']);
define('SENHA', $db_ambient_config['SENHA']);
define('DB', $db_ambient_config['DB']);



$conectar = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');


function get_tables($conectar)
{
  $tableList = array();
  $res = mysqli_query($conectar,"SHOW TABLES");
  while($cRow = mysqli_fetch_array($res))
  {
    $tableList[] = $cRow[0];
  }
  return $tableList;
}

// echo json_encode(get_tables($conectar));
    /*function abrirBanco(){
        $dns = "mysql:localhost;dbname=draco";
        $usuario = "root";
        $senha = "r3d3g3nirvana";


        $opcoes = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET character_set_connection=utf8',
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET character_set_client=utf8',
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET character_set_results=utf8'    
        );

        try{
            $pdo = new PDO($dns,$usuario,$senha, $opcoes);
        }catch(PDOException $e){
           echo $e->getMessage();  
        }
        return $pdo;

    }*/

?>