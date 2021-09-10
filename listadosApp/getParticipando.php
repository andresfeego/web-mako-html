<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	   $idUsuario = $obj['idUsuario'];
	   $idSorteo = $obj['idSorteo'];

	 // name store into $name.
	

			$sql = "select u.* , hu.idSorteo
			from usuario as u

			join sorteo_has_usuario as hu 
				on u.id = hu.idUsuario

			where u.correo = '".$idUsuario."' and hu.idSorteo = '".$idSorteo."'";


$res=mysql_query($sql);
if (mysql_num_rows($res)>0) {
	
	
	
			$Json1 = json_encode("1");	


	}

else {
	$Json1 = json_encode(mysql_num_rows($res));
}



echo $Json1;


mysql_close($conexion);

 ?>