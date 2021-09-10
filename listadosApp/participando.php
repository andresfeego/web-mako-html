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
	




$sql = "select id from `usuario` where correo = '".$idUsuario."' ";
		
						$res=mysql_query($sql);

						if (mysql_num_rows($res)>0) {

                            			$usuario = mysql_fetch_array($res);

                            			

	$sql1 = "INSERT INTO `sorteo_has_usuario` (`idSorteo`, `idUsuario` )VALUES ('".$idSorteo."', '".$usuario['id']."');";

				if ($results=@mysql_query($sql1)) {
				   
						$Json1 = json_encode("1");

				   }else{
				$Json1 = json_encode(mysql_error());				
			}

                        } else{
                        	$Json1 = json_encode(mysql_error());	
                        };





echo $Json1;


mysql_close($conexion);

 ?>