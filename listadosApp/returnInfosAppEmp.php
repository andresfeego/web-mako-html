<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	   $codigo = $obj['codigo'];

	 // name store into $name.
	

			$sql = "select  i.*, e.codigo

			from empresa as e
	
			join empresa_has_infor as hi 
				on hi.id_empresa = e.codigo

			join informativo as i
				on hi.id_infor = i.id

			
			where e.codigo = '".$codigo."' and i.eliminado = '0' order by id DESC ";
		


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