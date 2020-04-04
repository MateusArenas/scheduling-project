<?php
  $folder = dirname(__FILE__) . DIRECTORY_SEPARATOR  . "migrations";
  if (!file_exists($folder)) {
    mkdir($folder, 0700);
  }

  $table_name = readline("migration:create: ");
  $isJSON = readline("migration:JSON(S/N): ") === 'S' ? true : false;
echo $table_name;
  $table_date = date('Y-m-d');
  $file = $folder . DIRECTORY_SEPARATOR . $table_name.'_'.$table_date;
  if (!file_exists($file . '.json') && !file_exists($file . '.sql')) {
    create_migration($file, $isJSON, $table_name);
  }

  function create_migration($file, $isJSON, $table_name) {
    $file_extension = $isJSON ? '.json' : '.sql';
    $myfile = fopen( $file . $file_extension, "w") or die("Unable to open file!");

    $write = '';
    if ($isJSON) {
      $stringfy_data_default_json = file_get_contents('.' . DIRECTORY_SEPARATOR . 'generator_default.json');
      $array_data_default_json = json_decode($stringfy_data_default_json, true);
      $array_data_default_json['Table'] = $table_name;
      $write = json_encode($array_data_default_json, JSON_PRETTY_PRINT);
    } else {
      $stringfy_data_default_sql = file_get_contents('.' . DIRECTORY_SEPARATOR . 'generator_default.sql');
      $write = str_replace("table_name", $table_name, $stringfy_data_default_sql);
    }

    fwrite($myfile, $write);
    fclose($myfile);
  }

?>