<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
  $activo = $obj['activo'];
  $idComercio = $obj['idComercio'];
  $titulo = $obj['titulo'];
  $descrip = $obj['descrip'];
  $fechaInicio = $obj['fechaInicio'];
  $fechaFin = $obj['fechaFin'];
	
$fecha = date('Y-m-d');




$sql = "INSERT INTO `informativo` (`titulo`, `descripcion`, `fechaInicio`, `fechaFin`, `activo`)VALUES ('".$titulo."', '".$descrip."', '".$fechaInicio."', '".$fechaFin."', '".$activo."');";                     
   if ($results=@mysql_query($sql)) {
                            	
                            	if ($activo == 1) {
                            		$sql1 = "update empresa set numInfo = (numInfo+1) where codigo='".$idComercio."'";
  									$results=@mysql_query($sql1);
                            	}

                            	
                            	$rs = mysql_query("select max(id) as id from `informativo` ");
								
								if ($row = mysql_fetch_row($rs)) {
									$idInformativo = trim($row[0]);
			
								};


								$sql2 = "INSERT INTO   `empresa_has_infor` (`id_empresa`,`id_infor`)VALUES ('".$idComercio."','".$idInformativo."');";


                            	

                            	if ($results=@mysql_query($sql2)) {

                                $Json1 = json_encode("1");
                            }else{
                        	$Json1 = json_encode("0");	
                            	
                            }
                             
                         
                        } else{
                        	$Json1 = json_encode("0");	
                        };




echo $Json1;


mysql_close($conexion);

 ?>