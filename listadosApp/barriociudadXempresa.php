

			<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];

$sql = "select  b.nombreBarrio, c.*
			from empresa as e

			join barrios as b 
				on e.barrio = b.idBarrio

			join ciudades as c
				on c.id_ciudad = b.id_ciudad

			where e.codigo = '".$id."'";



$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {
	
	while ($row= mysql_fetch_array($res)) {
		$Json1 = json_encode($row);	
	}



} else {
	$finaljson = json_encode("No se ha encontrado informacion para este comercio");
}




echo $Json1;


mysql_close($conexion);

 ?>