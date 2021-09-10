<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.

	$idComercio = $obj['idComercio'];
	$sugerencia = $obj['sugerencia'];
	$fecha = date('Y-m-d');




$sql = "INSERT INTO `sugerenciasEmp` (`sugerencia`, `fecha`)VALUES ('".$sugerencia."', '".$fecha."');";                     
   if ($results=@mysql_query($sql)) {
                            	
                            	

                            	
                            	$rs = mysql_query("select max(id) as id from `sugerenciasEmp` ");
								
								if ($row = mysql_fetch_row($rs)) {
									$idSuger = trim($row[0]);
			
								};


								$sql2 = "INSERT INTO   `empresa_has_sugerencia` (`id_empresa`,`id_sugerencia`)VALUES ('".$idComercio."','".$idSuger."');";


                            	

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