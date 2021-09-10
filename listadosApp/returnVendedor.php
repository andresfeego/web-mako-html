<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];


$sql = "select * from vendedores where identificacion = '".$id."' ";
$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {
	
	while ($row = mysql_fetch_array($res)) {
		
		$json = json_encode($row);
	}

} else {
	$json = json_encode("No se han encontrado ventas");
}

echo $json;


mysql_close($conexion);

 ?>