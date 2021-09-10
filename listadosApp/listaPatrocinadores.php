<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	

			$sql = "select e.*, ci.color

			from empresa as  e
			
			join barrios as ba
			on e.barrio = ba.idBarrio

			join ciudades as ci
			on ba.id_ciudad = ci.id_ciudad
			
			join empresa_has_categoria as hc
			on e.codigo = hc.id_empresa

			join categoria as ca
			on hc.idCat = ca.idCat

			where e.oculto = 0 and e.patrocinador ='1' order by fechaRegistro desc";
		


$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {
	
	while ($row[] = mysql_fetch_array($res)) {
	
			$Json1 = json_encode($row);	
			
		
		
	}

	
	}

else {
	$Json1 = json_encode("0");
}



echo $Json1;


mysql_close($conexion);

 ?>