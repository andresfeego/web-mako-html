<?php 
function generarnombre($longitud) {
 $key = '';
 $pattern = '123456789abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$target_dir = "/".generarnombre(10).".jpg";
 
	

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target_dir)) {

  $Json1 = json_encode("1");


  } else{
  $Json1 = json_encode("0");	
  };




  echo $Json1;


mysql_close($conexion);






 ?>