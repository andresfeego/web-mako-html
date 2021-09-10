<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];
	$dia = $obj['dia'];
	$mes = $obj['mes'];
	$fecha='("2018-'.$mes.'-'.$dia.'")';




$sql = "update ventas set fechaPospuesto=".$fecha." where idVenta='".$id."'";
                        if ($results=@mysql_query($sql)) {
                        	$Json1 = json_encode("1");
                        } else{
                        	$Json1 = json_encode("0");	
                        };




echo $Json1;


mysql_close($conexion);

 ?>