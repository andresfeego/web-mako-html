<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
  $idPromo = $obj['idPromo'];
  $idComercio = $obj['idComercio'];
  $porciento = $obj['porciento'];
  $titulo = $obj['titulo'];
  $descrip = $obj['descrip'];
  $fechaInicio = $obj['fechaInicio'];
  $fechaFin = $obj['fechaFin'];
  $existencias = $obj['existencias'];
	
$fecha = date('Y-m-d');




$sql = "update promo set `titulo` = '".$titulo."' ,`descripcion` = '".$descrip."' ,  `fechaInicio` = '".$fechaInicio."' , `fechaFin` = '".$fechaFin."'  , `existencias` = '".$existencias."' , `porciento` = '".$porciento."'   where id='".$idPromo."'";
                        if ($results=@mysql_query($sql)) {
                            	

                                $Json1 = json_encode($sql);
                             
                         
                        } else{
                        	$Json1 = json_encode("0");	
                        };




echo $Json1;


mysql_close($conexion);

 ?>