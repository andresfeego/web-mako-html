<?php 
include ("../registro/conexion.php");
  mysql_select_db($baseDatos);
  mysql_query("SET NAMES 'UTF8'");

$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
$id = $obj['id'];
$pass1 = $obj['pass1'];
$fecha = date('Y-m-d');




	$sql = "update codigos set pass= '".$pass1."' where email='".$id."'";
		
						  if ($results=@mysql_query($sql)) {

						  	$sql = "select * from `codigos` where email = '".$id."' ";
							$res=mysql_query($sql);
							$empresa=mysql_fetch_array($res);
        
                                $Json1 = json_encode($empresa['codigo']);
                             
                              } else{
                                $Json1 = json_encode("0");  
                              }



echo $Json1;


mysql_close($conexion);

 ?>