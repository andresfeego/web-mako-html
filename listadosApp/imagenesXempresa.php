<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];

$sql = "select e.codigo , i.*
			from empresa as e

			join empresa_has_imagen as h 
				on e.codigo = h.id_empresa

			join imagen as i
				on h.id_imagen = i.id

			where e.codigo = '".$id."'";



$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {
	
	while ($row[] = mysql_fetch_array($res)) {
		$Json1 = json_encode($row);	
	}



} else {
	$Json1 = json_encode("0");
}




echo $Json1;


mysql_close($conexion);

 ?>