<?php 
error_reporting(E_ALL);
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

$numnom = generarnombre(10);

$target_dir = "../directorio/imagenes/promos/". $_FILES["id"]["name"] . "/";

if (!file_exists($target_dir)) {
  mkdir($target_dir, 0777, true);
}

    if ($_FILES["eliminar"]["name"] != '1') {

        if ($_FILES["imagen"]["name"] != 'imagen.png') {

            $nombre = $_FILES["imagen"]["name"];

            if(file_exists($target_dir.$nombre)) {
                chmod($target_dir.$nombre,0755); //Change the file permissions if allowed
                unlink($target_dir.$nombre); //remove the file
            }
        } else {

        $numnom = generarnombre(10);
             $nombre = $numnom.".jpg";

        }

        $numnom = generarnombre(10);
        $nombre = $numnom.".jpg";
        $target_dir = $target_dir . $nombre;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_dir)) {

            $Json1 = json_encode($nombre);

        } else{
             $Json1 = json_encode("0");  
        };


    }else{

        $nombre = $_FILES["imagen"]["name"];

        if(file_exists($target_dir.$nombre)) {
                chmod($target_dir.$nombre,0755); //Change the file permissions if allowed
                if(unlink($target_dir.$nombre)){

                    $Json1 = json_encode("1");  
                  
                }else{

                    $Json1 = json_encode("0");  
                  
                }
        }else {

                $Json1 = json_encode("0");  

        }

    }







  echo $Json1;


mysql_close($conexion);






 ?>