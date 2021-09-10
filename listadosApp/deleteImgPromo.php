<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$numnom = generarnombre(10);

$target_dir = "../directorio/imagenes/promos/";

  
  
  $nombre = $_FILES["imagen"]["name"];




  if(file_exists($target_dir.$nombre)) {
    chmod($target_dir.$nombre,0755); //Change the file permissions if allowed
  }
  

  if (unlink($target_dir.$nombre)) {

  $Json1 = json_encode(null);


  } else{
  $Json1 = json_encode("0");  
  };







  echo $Json1;


mysql_close($conexion);







 ?>