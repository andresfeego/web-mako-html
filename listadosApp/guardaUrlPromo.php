<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];
	$url = $obj['url'];
	


if ($url == '1') {

		$sql = "update promo set imagen = NULL where id='".$id."'";

		if ($results=@mysql_query($sql)) {

				$Json1 = json_encode("1");

		} else{

				$Json1 = json_encode(mysql_error());	

		};
	
} else {
		
		$sql = "update promo set imagen='".$url."' where id='".$id."'";
		
		if ($results=@mysql_query($sql)) {

				$Json1 = json_encode("1");

		} else{

				$Json1 = json_encode(mysql_error());	

		};

	
}





echo $Json1;


mysql_close($conexion);

 ?>