<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	   $codigo = $obj['codigo'];

	 // name store into $name.
	

			$sql = "select  s.*, e.codigo

			from empresa as e
	
			join empresa_has_sorteo as hs 
				on hs.idEmpresa = e.codigo

			join sorteo as s
				on hs.idSorteo = s.id

			
			where e.codigo =  '".$codigo."' and s.activo = '1' ";
		


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