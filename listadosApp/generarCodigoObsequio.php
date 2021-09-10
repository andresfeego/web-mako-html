<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$id = $obj['id'];
$Fecha = date('Y-m-d H:i');



$sql="select codigo from  codigos where enUso = '0' and registrando = '0'  order by codigos.numeroFactura asc limit 0,1 ";
			$res=mysql_query($sql);

			$fila=mysql_fetch_array($res);



			$sql = "update codigos set registrando='1',`fechayHora` =  '".$Fecha."' where codigo='".$fila['codigo']."'";

			if ($results=@mysql_query($sql)) {


				$sql1 = "INSERT INTO `ventas` (`idComercio`, `idVendedor`, `estado`, `plan`, `numConsignacion`, `dineroEntregado` )VALUES ('".$fila['codigo']."', '".$id."','5',  '5',  '-1' ,  '-1');";

				if ($results=@mysql_query($sql1)) {
				   
						$Json1 = json_encode($fila['codigo']);

				   }else{
				$Json1 = json_encode("3");				
			}

			
			} else{
				$Json1 = json_encode("2");				
			}






echo $Json1;


mysql_close($conexion);

 ?>