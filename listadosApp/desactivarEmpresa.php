<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
  $id = $obj['id'];
  $idComercio = $obj['idComercio'];
 	$fecha = date('Y-m-d');


$sql = "update empresa set activo = '0' where codigo='".$id."'";
                        if ($results=@mysql_query($sql)) {
              

                                $Json1 = json_encode("1");
                             
                         
                        } else{
                        	$Json1 = json_encode("0");	
                        };




echo $Json1;


mysql_close($conexion);

 ?>