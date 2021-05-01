<?php
  $dsn = "mysql:dbname=projeto_ordenar;host=localhost";
  $dbuser= "root";
  $dbpass = "";
  try{
    $db = new PDO($dsn, $dbuser, $dbpass);
  }catch(PDOException $e){
    echo "Erro de conexão com o banco de dados: ".$e->getMessage();
    exit;
  } 

?>