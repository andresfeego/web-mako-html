<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$cat = $obj['cat'];
	$lista = $obj['lista'];

if ($cat == 0) {
	$sql = "select * from categorias order by nombre asc ";
} else {

	switch ($lista) {
		case '1':
		$sql = "select * from subcategoria1 where id_categoria = '".$cat."' order by nombre asc";
			break;
		
		case '2':
		$sql = "select * from subcategoria2 where idsubcategoria1 = '".$cat."' order by nombre asc";
			break;
	}
	
	
}



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