<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];

$sql = "select e.codigo , ho.*, jo.*
			from empresa as e

			join empresa_has_horario as hh 
				on e.codigo = hh.empresa_codigo

			join horario as ho
				on hh.horario_idhorario = ho.idhorario

			join horario_has_jornadas as hj 
				on hj.horario_idhorario = ho.idhorario

			join jornadas as jo
				on jo.idjornadas = hj.jornadas_idjornadas

			where e.codigo = '".$id."'";



$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {
	
	while ($row[] = mysql_fetch_array($res)) {
		$Json1 = json_encode($row);	
	}



} else {
	$Json1 = json_encode("No se ha encontrado informacion para este comercio");
}




echo $Json1;


mysql_close($conexion);

 ?>